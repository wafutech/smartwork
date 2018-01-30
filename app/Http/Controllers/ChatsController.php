<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\ChatMessage;
use Auth;
use App\Events\MessageSent;


class ChatsController extends Controller
{
    
    public function __construct()
{
  $this->middleware(['auth']);
}

/**
 * Show chats
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
  return view('chats.index');
}

/**
 * Fetch all messages
 *
 * @return Message
 */
public function fetchMessages()
{
  return ChatMessage::with('user')->get();
}

/**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */
public function sendMessage(Request $request)
{
  $message = new ChatMessage;
  $message->user_id = Auth::User()->id;
  $message->chat_message = $request->input('message');
  $message->save();
  /*$user = Auth::user();

  $message = $user->chatmessages()->create([
    'chat_message' => $request->input('message')
  ]);*/
 broadcast(new MessageSent($user, $message))->toOthers();


  return ['status' => 'Message Sent!'];
}


}
