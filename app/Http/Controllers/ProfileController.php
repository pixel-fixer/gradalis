<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Business\Business;
use App\Models\Franchise\Franchise;
use App\Models\Service\OrderedService;
use App\Models\PaymentTransaction;
use App\Models\ViewRequest;
class ProfileController extends Controller
{
    /**
     * View для SPA личного кабинета
     */
    public function index()
    {
        $user = Auth::user();

        //TODO Или выдать permission нужным ролям?
        $user->canModerateMessages = $user->canModerateMessages();

        $roles = $user->roles->pluck('name')->all();
        $user = $user->toArray();
        $user['roles'] = $roles; //Почему то работает только так.

        return view('profile.profile', compact('user'));
    }

    /**
     * Обновление настроек профиля
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'email|unique:users,email,'.Auth::id(),
            'phone' => 'required|string',
            'city_id' => 'sometimes',
            'subscribes' => 'sometimes'
        ]); 
        
        Auth::user()->fill($data)->save();

        return response(['message' => 'Профиль обновлен'], 200);
    }
    
    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'file' => 'required|file|image|max:2048'
        ]);

        Auth::user()->addMedia($request->file('file'))->toMediaCollection('avatar');

        return response(['message' => 'Аватар добавлен', 'avatar' => Auth::user()->avatar], 201);
    }

    /**
     * Смена пароля.
     * Проверка старого пароля, проверка нового пароля на совпадение со старым.
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $validator->after(function ($validator) use ($request) {
            if (Hash::check($request->get('password'), Auth::user()->password)) {
                $validator->errors()->add('password', __('validation.new_password'));
            }

            if(!Hash::check($request->get('old_password'), Auth::user()->password)){
                $validator->errors()->add('old_password', __('validation.old_password'));
            }
        });

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }else{
            //TODO Эвент на смену пароля

            Auth::user()->password = Hash::make($request->get('password'));
            Auth::user()->save();

            return response(['message' => 'Новый пароль установлен'], 200);
        }
    }

    /**
     * Список городов для селекта
     */
    public function getCities(Request $request)
    {
        $cities = City::query();
        $country_id = $request->get('country_id', null);

        if($country_id){
            $cities->where('country_id',  $country_id);
        }

        return $cities->get();
    }

    /**
     * Список избранных объектов
     */
    public function getFavorites()
    {
        //TODO from cache
        return Auth::user()->favorites()->with('favoriteable.category')->get();
    }

    public function addBusinessToFavorites(Business $object)
    {
        if(!$object->isFavorited())
            $object->addFavorite();
    }

    public function addFranchiseToFavorites(Franchise $object)
    {
        if(!$object->isFavorited())
            $object->addFavorite();
    }

    public function getPurchasedServices()
    {
        return OrderedService::where('user_id', Auth::id())->with('service')->get();
    }

    /**
     * Список транзакций на странице баланса
     */
    public function getPaymentTransactions()
    {
        return PaymentTransaction::where('user_id', Auth::id())->orderBy('created_at')->get();
    }

    public function getViewRequests()
    {
        //TODO похоже на дичь, подумать.
        $business = Business::where('user_id', Auth::id())->with(['view_request.user.city','view_request.object'])->get()->toArray();
        $franchise = Franchise::where('user_id', Auth::id())->with(['view_request.user.city','view_request.object'])->get()->toArray();

        $view_requests = collect(array_merge($business, $franchise))->map(function($item){
            return $item['view_request'];
        })->reject(function ($item) {
            return empty($item);
        });
      
        $view_requests_mapped = [];
        foreach($view_requests->all() as $array){
            $view_requests_mapped = array_merge($view_requests_mapped, $array);
        }
        return $view_requests_mapped;  
    }

    public function setViewRequestStatus(ViewRequest $view_request, $status)
    {
        $view_request->status = $status;
        $view_request->save();

        //TODO translate message
        return response(['message' => 'Статус запроса изменен'], 200);
    }
}
