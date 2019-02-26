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

        $roles = $user->roles->pluck('name')->all();
        $user = $user->toArray();
        $user['roles'] = $roles;
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

        $dialogs = $dialogs->get()->map(function ($item){
            //TODO get notifications from db
            $item->notifications = 0;

            //if(Auth::user()->canModerateMessages())

            return $item;
        });

        return $dialogs;
    }

    public function newMessage()
    {
        //TODO Привязывать юзера к диалогу?

        request()->validate([
            'dialog_id' => 'required',
            'text' => 'required_without:file',
            'file' => 'file|required_if:text,==""'
        ]);

        $message = Message::create([
            'dialog_id' => request()->input('dialog_id'),
            'from' => Auth::id(),
            'text' => request()->input('text',''),
            'status' => Auth::user()->hasAnyRole(['Брокер-продавец', 'Брокер-покупатель']) ? 0 : 1
        ]);

        if(request()->hasFile('file') && request()->file('file')->isValid())
            $message->addMedia(request()->file('file'))->toMediaCollection();

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


    public function newDialog(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'theme' => 'required',
            'message' => 'required',
            'type' => 'required'
        ]);

        switch ($request->get('type')){
            case 'broker':
                if($user->hasRole('Покупатель')){
                    $type = 'buyer';
                }
                if($user->hasRole('Продавец')){
                    $type = 'seller';
                }

                if($user->broker()->exists())
                    $broker_id = $user->broker->id;
                else
                    return response(['message' => "User is't belongs to any broker"], 422);

                //TODO обработать случаи, если топик стартер не входит в группы выше
                break;
            case 'support':
                $type = 'support';
                break;
            default:
                return response('Wrong dialog type', 422);
        }

        $dialog = Dialog::create([
            'theme' => $request->get('theme'),
            'user_id' => $user->id,
            'type' => $type
        ]);

        //TODO прикрепить нужных юезров к диалогу
        //TODO выслать уведомления

        Message::create([
            'dialog_id' => $dialog->id,
            'from' => $user->id,
            'status' => 1, //TODO если это пишет не юзер, у которого включена премодерация сообщений
            'text' => $request->get('message')
        ]);

        return $dialog;
    }


    public function getDialog(Dialog $dialog)
    {
        $search = request()->get('search', null);

        $dialog = $dialog->load(['messages' => function($query) use ($search){

            if($search){
                $query->where('text', 'LIKE', '%'.$search.'%');
            }

            $query->with(['from','media']);

            //Если пользователь может модерировать сообщения, или это его сообшения
            if(!Auth::user()->canModerateMessages()) {
                $query->where('status', '!=', 0)->orWhere('from', Auth::user()->id);
            }
        }]);

        return $dialog;
    }

    public function getMessages(Dialog $dialog)
    {
        $messages = Message::where('dialog__id', $dialog->id);

        if(!Auth::user()->canModerateMessages()) {
            $messages->where('status', '!=', 0)->orWhere('from', Auth::user()->id);
        }

        // $messages = $messages->map(function ($item){
        //     foreach ($item->media as $k => $media){
        //         $item->media[$k]->url =  [
        //             'origin' => $media->getUrl(),
        //             'thumb' =>$media->getUrl('thumb')
        //         ];
        //     }
        //     return $item;
        // });

        return $messages;
    }
}
