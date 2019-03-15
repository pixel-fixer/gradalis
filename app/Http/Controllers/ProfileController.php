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
use App\Models\ObjectRequest;
use App\Models\Travel\Travel;
use App\Models\Auth\User;
class ProfileController extends Controller
{
    /**
     * View для SPA личного кабинета
     */
    public function index()
    {
        return view('profile.profile');
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
        }
        
        //TODO Эвент на смену пароля

        Auth::user()->password = Hash::make($request->get('password'));
        Auth::user()->save();

        return response(['message' => 'Новый пароль установлен'], 200);
        
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

    public function toggleFavoriteBusiness(Business $object)
    {
        $object->toggleFavorite();

        return ['message' => $object->isFavorited() ? 'Бизнес добавлен в избранное': 'Бизнес удален из избранного'];
    }

    public function toggleFavoriteFranchise(Franchise $object)
    {
        $object->toggleFavorite();

        return ['message' => $object->isFavorited() ? 'Франшиза добавлена в избранное' : 'Франшиза удалена из избранного'];
    }

    public function getPurchasedServices()
    {
        return OrderedService::where('user_id', Auth::id())->with('service')->get();
    }

    public function getPurchasedService(OrderedService $service)
    {
        return $service;
    }

    /**
     * Список транзакций на странице баланса
     */
    public function getPaymentTransactions()
    {
        return PaymentTransaction::where('user_id', Auth::id())->orderBy('created_at')->get();
    }

    public function getObjectRequests($type)
    {
        $business = Business::where('user_id', Auth::id())->with(['view_request.user.city','view_request.object'])->get()->toArray();
        $franchise = Franchise::where('user_id', Auth::id())->with(['view_request.user.city','view_request.object'])->get()->toArray();

        $view_requests = collect(array_merge($business, $franchise))->map(function($item){
            return $item['view_request'];
        })->reject(function ($item) {
            return empty($item);
        });

  
        $view_requests_mapped = [];
        foreach($view_requests->values()->all() as $array){
            $view_requests_mapped = array_merge($view_requests_mapped, $array);
        }

        switch ($type) {
            case 'view':
                $type_id = ObjectRequest::TYPE_VIEW;
                break;
            case 'doc':
                $type_id = ObjectRequest::TYPE_DOC;
                break;
        }

        $view_requests_mapped = array_filter($view_requests_mapped, function($item) use ($type_id){
            return $item['type'] == $type_id;
        });

        return array_values($view_requests_mapped);  
    }

    public function setObjectRequestStatus(ObjectRequest $view_request, $status)
    {
        $view_request->status = $status;
        $view_request->save();

        //TODO translate message
        return response(['message' => 'Статус запроса изменен'], 200);
    }

    public function getObjects()
    {
        $business = Business::where('user_id', Auth::id())->with(['city.country', 'view_request', 'doc_request'])->get()->map(function($item){
            $item->favorites_count = $item->favoritesCount;
            $item->status_labels = $item->getStatuses();
            $item->type= 'business';
            return $item;
        });

        $franchise = Franchise::where('user_id', Auth::id())->with(['city.country', 'view_request', 'doc_request'])->get()->map(function($item){
            $item->favorites_count = $item->favoritesCount;
            $item->status_labels = $item->getStatuses();
            $item->type= 'franchise';
            return $item;
        });

        return $business->concat($franchise);
    }

    public function setObjectStatus($type, $id, $status)
    {
        switch ($type) {
            case 'business':
                $object = Business::where([['id', $id], ['user_id', Auth::id()]])->first();
                break;
            case 'franchise':
                $object = Franchise::where([['id', $id], ['user_id', Auth::id()]])->first();
                break;
        }

        if(!$object){
            return response(['message' => 'Object not found'], 404);
        }

        $object->status = $status;
        $object->save();

        return response(['message' => 'Статус объекта изменен'], 200);
    }

}
