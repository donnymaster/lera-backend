<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
        public function __construct()
    {
    $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('chat', compact('id'));
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages($id)
    {
        return Message::where('broadcast_id', '=', $id)->with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {

    $user = Auth::user();

    $message = $user->messages()->create([
        'message' => $request->input('message'),
        'user_id' => Auth::user()->id,
        'broadcast_id' => $request->input('broadcast_id')
    ]);

    broadcast(new MessageSent($user, $message))->toOthers();

    return ['status' => 'Message Sent!'];
    }
}
