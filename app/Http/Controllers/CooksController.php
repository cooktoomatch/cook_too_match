<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CookRequest;
use App\Http\Requests\CookUpdateRequest;
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
        return Comment::where('cook_id', $request->cook_id)->get();
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
        return view('cooks_index', ['cooks' => $cooks, 'currentUser' => json_encode($currentUser), 'addArr' => json_encode($addArr)]);
    }

    public function create()
    {
        return view('cooks_new');
    }

    public function store(CookRequest $request)
    {
        $start_time = $request->start_year . '-' . $request->start_month . '-' . $request->start_day . ' ' . $request->start_hour . ':' . $request->start_minute;
        $end_time = $request->end_year . '-' . $request->end_month . '-' . $request->end_day . ' ' . $request->end_hour . ':' . $request->end_minute;

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

    public function edit(Cook $cooks)
    {
        return view('cooks_edit', ['cook' => $cooks]);
    }

    public function update(CookUpdateRequest $request)
    {
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
