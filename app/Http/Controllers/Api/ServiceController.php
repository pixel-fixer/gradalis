<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service\ServiceCategory;
use App\Models\Service\Service;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Symfony\Component\DomCrawler\Crawler;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Http\File;

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
            'price_for'=> 'required',
            'detail_text' => 'sometimes',
            'promo_video' => 'sometimes'
        ]);

        $service->fill($data);

        $service->save();


        return ['message' => 'Услуга сохранена'];
    }

    // public function handleQuillContent()
    // {
    //     $desc = $request->input('some_html'); // POST with html
    //     $dom_desc = new Crawler($desc);
    //     $images = $dom_desc->filterXPath('//img')->extract(array('src')); // extract images
         
    //     foreach ($images as $key => $value) {
    //         if (strpos($value, 'base64') !== false) { // leave alone not base64 images
    //             $data = explode(',', $value); // split image mime and body
    //             $tmp_file = tempnam('/tmp', 'items'); // create tmp file path
    //             file_put_contents($tmp_file, base64_decode($data[1])); // fill temp file with image
    //             $path = Storage::putFile('public/items', new File($tmp_file)); // put file to final destination
    //             $desc = str_replace($value, $path, $desc); // replace src of converted file to fs path
    //             unlink($tmp_file); // delete temp file
    //         }
    //     }
    // }
}