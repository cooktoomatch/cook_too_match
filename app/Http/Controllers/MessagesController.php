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
    // public function json(Request $request)
    // {
    //     $messages = Message::where('conversation_id', $request->conversation_id);
    //     return json_encode($messages);
    // }

    public function json()
    {
        return Message::with(['conversation.sender_user', 'conversation.recipient_user'])->first();
    }

    public function index(Conversation $conversation)
    {
        $messages = $conversation->messages;
        return view('messages_index', ['messages' => $messages, 'conversation' => $conversation]);
    }

    public function store(MessageRequest $request)
    {
        $message = new Message;
        $message->content = $request->content;
        $message->conversation_id = $request->conversation_id;
        $message->user_id = $request->user_id;
        $message->save();

        $res = array(
            'message' => $message,
            'user_icon' => $message->user->icon,
            'user_name' => $message->user->name
        );
        // return redirect('/conversations/' . $request->conversation_id . '/messages');

        return $res;
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
