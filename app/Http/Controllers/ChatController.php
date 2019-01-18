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
        return view('chat');
    }

    public function getDialogs($search = null)
    {
        //TODO Проверка на возможность смотреть диалоги, пока отдаются все существующие

        $dialogs = Dialog::with('user', 'object');

        $search = request()->get('search', null);

        if($search){
            $dialogs->where('theme', 'LIKE', '%'.$search.'%');
        }

        return $dialogs->get();
    }

    public function newMessage()
    {
        //TODO Привязывать юзера к диалогу?

        $message = Message::create([
            'dialog_id' => request()->input('dialog_id'),
            'from' => Auth::id(),
            'text' => request()->input('message')
        ]);

        //TODO если пишет администратор - то сразу сравить статус "принято"

        $message = $message->load('from');

        //broadcast(new \App\Events\NewMessage($message));

        return $message;
    }

    public function acceptMessage(Message $message)
    {
        //TODO Проверка прав
        //$isCanAccept = true;
        //if($isCanAccept){
            $message->status = 1;
            $message->save();

            return $message;
        //}else{

        //}
    }

    public function deleteMessage(Message $message)
    {
        //TODO Проверка прав
        //$isCanDelete = true;
        //if($isCanDelete){
            $message->delete();
            return 1;
        //}else{

        //}
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
        return $dialog->load('messages.from');
    }

    public function setChatRoles()
    {

    }

}
