<?php

namespace CTFlor\Http\Controllers;

use Illuminate\Http\Request;

use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Participant;

class ChatController extends Controller
{

    public function index()
    {
        //$participants = Participant::orderBy('name')->get();

        return view('chat');
    }


    public function sendMessage()
    {
        $username = Input::get('username');
        $text = Input::get('text');

        $chatMessage = new ChatMessage();
        $chatMessage->sender_username = $username;
        $chatMessage->message = $text;
        $chatMessage->save();
    }

    public function isTyping()
    {
        $username = Input::get('username');

        $chat = Chat::find(1);
        if ($chat->userParticipant == $username)
            $chat->userParticipant_is_typing = true;
        else
            $chat->userBanca_is_typing = true;
        $chat->save();
    }

    public function notTyping()
    {
        $username = Input::get('username');

        $chat = Chat::find(1);
        if ($chat->userParticipant == $username)
            $chat->userParticipant_is_typing = false;
        else
            $chat->userBanca_is_typing = false;
        $chat->save();
    }

    public function retrieveChatMessages()
    {
        $username = Input::get('username');

        $message = ChatMessage::where('sender_username', '!=', $username)->where('read', '=', false)->first();

        if (count($message) > 0)
        {
            $message->read = true;
            $message->save();
            return $message->message;
        }
    }

    public function retrieveTypingStatus()
    {
        $username = Input::get('username');

        $chat = Chat::find(1);
        if ($chat->userParticipant == $username)
        {
            if ($chat->userBanca_is_typing)
                return $chat->userBanca;
        }
        else
        {
            if ($chat->userParticipant_is_typing)
                return $chat->userParticipant;
        }
    }
}
