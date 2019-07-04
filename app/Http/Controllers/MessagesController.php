<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Message;
use App\Conversation;
use Validator;
use Auth;

class MessagesController extends Controller
{

    public function json()
    {
        return Message::all();
    }

    public function index(Conversation $conversation)
    {   
        $messages = $conversation->messages;

        // dd($conversation->count());

        return view('messages_index', ['messages' => $messages, 'conversation' => $conversation]);
    }

    public function store(MessageRequest $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'content' => 'required',
        //     'conversation_id' => 'required',
        //     'user_id' => 'required',
        // ]);

        // if ($validator->fails()) {

        //     return redirect('/conversations/' . $request->conversation_id . '/messages')
        //         ->withInput()
        //         ->withErrors($validator);
        // }

        $message = new Message;
        $message->content = $request->content;
        $message->conversation_id = $request->conversation_id;
        $message->user_id = $request->user_id;
        $message->save();
        // return redirect('/conversations/' . $request->conversation_id . '/messages');

        return $message;
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
