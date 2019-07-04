<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
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

    public function json()
    {
        return Comment::all();
    }

    public function index()
    {
        $cooks = Cook::orderBy('created_at', 'asc')->paginate(10);
        $addArr = [];
        $users = User::orderBy('created_at', 'asc')->get();
        $currentUser = User::find(Auth::user()->id);
        for ($i = 0; $i < count($users); $i++) {
            array_push($addArr, array(
                'address' => $users[$i]->address,
                'lat' => $users[$i]->latitude,
                'lng' => $users[$i]->longitude,
            ));
        }
        return view('cooks_index', ['cooks' => $cooks, 'currentUser' => json_encode($currentUser), 'adArr' => json_encode($addArr)]);
    }

    public function create()
    {
        return view('cooks_new');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required | max:255',
            'image' => 'file | image | mimes:jpeg,png',
            'description' => 'required',
            'price'   => 'required',
            'num'   => 'required',
            'start_time'   => 'required',
            'end_time'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/cooks/create')
                ->withInput()
                ->withErrors($validator);
        }

        $cooks = new Cook;
        $cooks->name = $request->name;
        $filename = $request->file('image')->store('public/cook_image');
        $cooks->image = basename($filename);
        $cooks->description = $request->description;
        $cooks->price = $request->price;
        $cooks->etc = $request->etc;
        $cooks->user_id = Auth::user()->id;
        $cooks->num = $request->num;
        $cooks->start_time = $request->start_time;
        $cooks->end_time = $request->end_time;
        $cooks->save();
        return redirect('/cooks');
    }

    public function show(Cook $cooks)
    {
        return view('cooks_show', ['cook' => $cooks]);
    }

    public function edit(Cook $cooks)
    {
        return view('cooks_edit', ['cook' => $cooks]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required | max:255',
            'image' => 'required | file | image | mimes:jpeg,png',
            'description' => 'required',
            'price'   => 'required',
            'num'   => 'required',
            'start_time'   => 'required',
            'end_time'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/cooks/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $cooks = Cook::find($request->id);
        $cooks->name = $request->name;
        if ($request->file('image')) {
            $filename = $request->file('image')->store('public/cook_image');
            $cooks->image = basename($filename);
        }
        $cooks->description = $request->description;
        $cooks->price = $request->price;
        $cooks->etc = $request->etc;
        $cooks->user_id = Auth::user()->id;
        $cooks->num = $request->num;
        $cooks->start_time = $request->start_time;
        $cooks->end_time = $request->end_time;
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

        return $comment;
    }
}
