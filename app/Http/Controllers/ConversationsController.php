<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;
use Validator;
use Auth;

class ConversationsController extends Controller
{
    public function __construct()
    {
        // 
    }

    public function index()
    {
        $current_user_id = Auth::user()->id;
        $conversations = Conversation::where('sender_user_id', $current_user_id)->orwhere('recipient_user_id', $current_user_id)->get();

        dd($conversations);

        return view('conversations_index', ['conversations' => $conversations]);
    }

    public function store(Request $request)
    {
        $c1 = Conversation::whereRaw('sender_user_id = ? and recipient_user_id = ?', array($request->sender_user_id, $request->recipient_user_id))->get();
        $c2 = Conversation::whereRaw('sender_user_id = ? and recipient_user_id = ?', array($request->recipient_user_id, $request->sender_user_id))->get();

        if (count($c1) === 0 && count($c2) === 0) {
            $conversation = new Conversation;
            $conversation->sender_user_id = $request->sender_user_id;
            $conversation->recipient_user_id = $request->recipient_user_id;
            $conversation->save();
        } else if (count($c1) !== 0) {
            $conversation = $c1[0];
        } else if (count($c2) !== 0) {
            $conversation = $c2[0];
        }
        return redirect()->action(
            'MessagesController@index',
            ['conversation' => $conversation]
        );
    }

    public function show(Cook $cooks)
    {
        // 
    }

    public function edit(Cook $cooks)
    {
        // 
    }

    public function update(Request $request)
    {
        // 
    }

    public function destroy(Cook $cook)
    {
        // 
    }
}
