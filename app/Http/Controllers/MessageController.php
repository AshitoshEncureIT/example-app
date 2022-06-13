<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
// use Illuminate\Support\Facades\Request;

class MessageController extends Controller
{
    public function create(Request $request)
    {
        // print_r($reuest);die;
        $message = new Message();

        $message->title = $request->title;
        $message->content = $request->content;

        $message->save();

        return redirect('/');
    }

    public function view_message($id)
    {
        $message = Message::findOrFail($id);

        // echo $message->title;
        return view('message', ['message'=>$message]);
    }
}
