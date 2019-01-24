<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auth\User;
use App\Models\Chat\Message;
use App\Models\Chat\Dialog;
use Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        //TODO Или выдать permission нужным ролям?
        $user->canModerateMessages = $user->canModerateMessages();

        return view('chat', compact('user'));
    }

    public function getDialogs($search = null)
    {
        //TODO Проверка на возможность смотреть диалоги, пока отдаются все существующие

        $dialogs = Dialog::with('user', 'object');

        $search = request()->get('search', null);

        if($search){
            $dialogs->where('theme', 'LIKE', '%'.$search.'%');
        }

        $dialog = $dialogs->get()->map(function ($item){
            //TODO get notifications from db
            $item->notifications = 0;
            return $item;
        });

        return $dialog;
    }

    public function newMessage()
    {
        //TODO Привязывать юзера к диалогу?

        $message = Message::create([
            'dialog_id' => request()->input('dialog_id'),
            'from' => Auth::id(),
            'text' => request()->input('message'),
            'status' => Auth::user()->hasAnyRole(['Брокер-продавец', 'Брокер-покупатель']) ? 0 : 1
        ]);

        $message = $message->load('from');

        broadcast(new \App\Events\NewMessage($message))->toOthers();

        return $message;
    }

    public function acceptMessage(Message $message, Request $request)
    {
        if($request->user()->canModerateMessages()){
            $message->status = 1;
            $message->save();
            //TODO Броадкаст ивент на смену статуса / новое сообщение
            return $message;
        }else{
            return response('401 Unauthorized',401);
        }
    }

    public function deleteMessage(Message $message, Request $request)
    {
        $request->validate([
            'delete_reason' => 'required'
        ]);

        if(Auth::user()->canModerateMessages()){
            $message->delete_reason = $request->get('delete_reason');
            $message->save();
            $message->delete();
            //TODO Броадкаст ивент на удаление
            return response('OK');
        }else{
            return response('401 Unauthorized',401);
        }
    }

    /*
    public function newDialog(User $user, $type = null)
    {
        //TODO Можем ли мы создать диалог с этим пользователем
        if(true){

            //TODO Проверяем, к какой группе отноcится пользователь, чтобы определить вид диалога
            $type = $type ?: 0;

            $dialog = Dialog::create([
                'type' => $type,
                'user_id' => Auth::id()
            ]);

            $dialog->users()->attach([
                Auth::id(),
                $user->id
            ]);

            return $dialog->load('users');
        }else{
            return response('Unauthorized. You can not create this dialog', 401);
        }
    }
    */

    public function getMessages(Dialog $dialog)
    {
       // $messages = Message::where('dialog_id', $dialog->id);

//        $search = request()->get('search');
//        if($search){
//            $messages->where('text', 'LIKE', '%'.$search.'%');
//        }
//        $id1 = Auth::user()->id;
//        $id2 = $user->id;
//        $search = request()->get('search');
//
//        //TODO Брать только промодерированные
//        //TODO выбрать только нужные поля
//        $messages = Message::whereHas('from', function($query) use($id1, $id2){
//            $query->where('id', $id1)->orWhere('id', $id2);
//        })->whereHas('to', function($query) use($id1, $id2){
//            $query->where('id', $id1)->orWhere('id', $id2);
//        });
//

        //TODO забирать сообщения текущего юзера, которые удалены?

        $dialog = $dialog->load(['messages' => function($query){
            $query->with('from');

            //Если пользователь может модерировать сообщения, или это его сообшения
            if(!Auth::user()->canModerateMessages()) {
                $query->where('status', '!=', 0)->orWhere('from', Auth::user()->id);
            }
        }]);

        return $dialog;
    }

    public function setChatRoles()
    {

    }

}
