<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service\ServiceCategory;
use App\Models\Service\Service;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function getUserServices()
    {
        return [
            'services' => Service::where('user_id', Auth::id())->get(),
            'categories' => ServiceCategory::all(),
            'status_labels' => Service::getStatusLabels()
        ];
    }

    public function addUserService(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'type' => 'required',
            'price_pln' => 'required',
            'price_eur' => 'required',
            'price_for' => 'required',
        ]);

        $data['slug'] =  Str::slug($request->get('name'));
        $data['user_id'] = Auth::id();

        $service = Service::create($data);

        //TODO локализация
        return ['service_id' => $service->id, 'message' => 'Услуга добавлена'];
    }

    public function getServiceCategories()
    {
        return ServiceCategory::all();
    }

    public function getUserService(Service $service)
    {
        return $service;
    }

    public function updateUserService(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => 'required',
            'price_for'=> 'required'
        ]);

        $service->fill($data);

        $service->save();

        return ['message' => 'Услуга сохранена'];
    }
}