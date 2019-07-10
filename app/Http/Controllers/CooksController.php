<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CookRequest;
use App\Http\Requests\CookUpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Cook;
use App\User;
use App\Comment;
use Validator;
use Auth;


class CooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function json(Request $request)
    {
        return Comment::where('cook_id', $request->cook_id)->with('user')->get();
    }

    public function map()
    {
        return User::with('cooks')->get();
    }

    public function get_cooks(Request $request)
    {    
        $cooks = Cook::all();

        foreach ($cooks as $cook) {
            $lat = $request->lat;
            $lng = $request->lng;
            
            $cook->distance = $cook->set_distance($lat, $lng);
        }

        $sortedCooks = $cooks->sortBy('distance');

        return view('layouts/components/cookShow', ['cooks' => $sortedCooks]);
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->with('cooks')->get();
        $currentUser = Auth::user();
        $cooks = Cook::all();

        // distanceを追加
        foreach ($cooks as $cook) {
            $lat = $currentUser->latitude ? $currentUser->latitude : 35;
            $lng = $currentUser->longitude ? $currentUser->longitude : 135;
            
            $cook->distance = $cook->set_distance($lat, $lng);
        }

        // distanceでsort
        $sortedCooks = $cooks->sortBy('distance');

        return view('cooks_index', ['cooks' => $sortedCooks, 'currentUser' => $currentUser, 'users' => $users]);
    }

    public function good(Request $request)
    {
        $cook = Cook::find($request->cook_id);
        $cook->good = $request->good;
        $cook->save();

        return $cook;
    }

    public function create()
    {
        return view('cooks_new');
    }

    public function store(Request $request)
    {
        $start_time = $request->start_year . '-' . $request->start_month . '-' . $request->start_day . ' ' . $request->start_hour . ':' . $request->start_minute;
        $end_time = $request->end_year . '-' . $request->end_month . '-' . $request->end_day . ' ' . $request->end_hour . ':' . $request->end_minute;

        $requestBox = $request->all();

        $requestBox['start_time'] = $start_time;
        $requestBox['end_time'] = $end_time;

        // dd($requestBox);

        $rules = [
            'name'   => 'required | max:255',
            'image' => 'required | file | image | mimes:jpeg,png',
            'description' => 'required',
            'price'   => 'required',
            'num'   => 'required',
            'start_time' => 'required | date',
            'end_time' => 'required | date'
        ];
        $messages = [];

        $validator = Validator::make($requestBox, $rules, $messages);

        if ($validator->fails()) {
            return redirect('/cooks/create')->withErrors($validator)->withInput();
        }

        // dd($start_time);

        $cooks = new Cook;
        $cooks->name = $request->name;
        if (isset($request->image)) {
            $filename = $request->file('image')->store('public/cook_image');
            $cooks->image = basename($filename);
        }
        $cooks->description = $request->description;
        $cooks->user_id = Auth::id();
        $cooks->price = $request->price;
        $cooks->num = $request->num;
        $cooks->etc = $request->etc;
        $cooks->start_time = $start_time;
        $cooks->end_time = $end_time;
        $cooks->save();
        return redirect('/cooks');
    }

    public function show(Cook $cooks)
    {
        return view('cooks_show', ['cook' => $cooks]);
    }

    public function edit(Request $request, Cook $cooks)
    {
        $request->session()->put('cook_id', $cooks->id);

        return view('cooks_edit', ['cook' => $cooks]);
    }

    public function update(Request $request)
    {
        $start_time = $request->start_year . '-' . $request->start_month . '-' . $request->start_day . ' ' . $request->start_hour . ':' . $request->start_minute;
        $end_time = $request->end_year . '-' . $request->end_month . '-' . $request->end_day . ' ' . $request->end_hour . ':' . $request->end_minute;

        $requestBox = $request->all();

        $requestBox['start_time'] = $start_time;
        $requestBox['end_time'] = $end_time;

        // dd($requestBox);

        $rules = [
            'name'   => 'required | max:255',
            'image' => 'file | image | mimes:jpeg,png',
            'description' => 'required',
            'price'   => 'required',
            'num'   => 'required',
            'start_time' => 'required | date',
            'end_time' => 'required | date'
        ];
        $messages = [];

        $validator = Validator::make($requestBox, $rules, $messages);

        if ($validator->fails()) {
            return redirect('/cooks/edit/' . $request->session()->pull("cook_id"))->withErrors($validator)->withInput();
        }



        $cooks = Cook::find($request->id);
        $cooks->name = $request->name;
        if ($request->file('image')) {
            if ($cooks->image != basename($request->file('image'))) {
                Storage::disk('local')->delete('public/cook_image/' . $cooks->image);
            }
            $filename = $request->file('image')->store('public/cook_image');
            $cooks->image = basename($filename);
        }

        $cooks->description = $request->description;
        $cooks->price = $request->price;
        $cooks->etc = $request->etc;
        $cooks->user_id = Auth::user()->id;
        $cooks->num = $request->num;
        $cooks->start_time = $start_time;
        $cooks->end_time = $end_time;
        $cooks->save();
        return redirect('/cooks');
    }

    public function destroy(Cook $cook)
    {
        $cook->delete();
        return redirect('/cooks');
    }
    public function comment(CommentRequest $request)
    {
        $comment = new Comment;
        $comment->cook_id = $request->cook_id;
        $comment->user_id = $request->user_id;
        $comment->content = $request->content;
        $comment->save();
        // return redirect('/conversations/' . $request->conversation_id . '/messages');

        return $comment->with('user')->get();
    }
}
