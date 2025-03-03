<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('chat');
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);

        broadcast(new MessageSent($message->load('user')))->toOthers();

        return response()->json(['message' => $message]);
    }
}
