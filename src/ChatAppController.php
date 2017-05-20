<?php

namespace Hanish\ChatApp;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatAppController extends Controller
{
    public function index($id,$to=null)
    {

        $msgfrm = $id;
        if ($to != null) {
            $result = Chat::leftjoin('users', 'users.id', '=', 'chatmessages.msgFrom')
                ->where(['chatmessages.msgTo'=> $id,'chatmessages.msgFrom'=> $to])
                ->orWhere(['chatmessages.msgTo'=> $to,'chatmessages.msgFrom'=> $id])
                ->get();
        } else
        {
            $result=null;
            //$result = Chat::leftjoin('users', 'users.id', '=', 'chatmessages.msgFrom')
           //     ->where('chatmessages.msgTo', $id)->orWhere('chatmessages.msgFrom', $id)
           //     ->get();
        }
       // $result = Chat::where('msgTo',$id)->orWhere('msgFrom',$id)->orderBy('msgId','ASC')->get();
       // dd($result);
        $users = User::where('id','<>',$id)->get();
        $emoji = Emoji::all();

        if ($to != null) {
            $chatDetail = User::where('id',$to)->get();
            //dd($chatDetail);
            $HTml = view('chat::msg', compact('result', 'users', 'msgfrm','chatDetail','emoji'))->renderSections()['msgContent'];
        }
        else
        {
            $HTml = view('chat::msg', compact('result', 'users', 'msgfrm','emoji'))->renderSections()['msgContent'];
        }
        print_r($HTml);
    }

    public function sendmsg($from,$to=null,Request $request)
    {
        $input = $request->all();
        unset($input['_token']);

        $input['msgFrom']=$from;

        $input['msgTo'] = $to;

        Chat::create($input);
        echo $to;
    }
}
