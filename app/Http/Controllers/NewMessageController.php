<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Events\NewMessageEvent;
use Illuminate\Http\Request;

class NewMessageController extends Controller
{
    public function send(Request $request)
    {
        $message = $request->input('message');

        broadcast(new NewMessageEvent($message));

        return response()->json(['status' => 'Message sent!']);
    }
}
