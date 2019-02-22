<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Business\Business;
use App\Models\Business\BusinessCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\Models\Media;


class BusinessController extends Controller
{
    public function get(Request $request)
    {
        $query = $request->all();

        $businesses = Business::whereIn('status', [Business::STATUS_SOLD_OUT, Business::STATUS_APPROUVED])->with('city')->with('city.country')->with('category');
        if (!empty($query['country'])) {
            $businesses->whereHas('city.country', function ($q) use ($query) {
                $q->where('id', (int)$query['country']);
            });
        }

        if (!empty($query['query'])) {
            $businesses->where('name', 'like', '%' . $query['query'] . '%');
        }

        if (!empty($query['category'])) {
            $businesses->where('category_id', (int)$query['category']);
        }
        if (!empty($query['price'])) {
            $price = $query['price'];
            $businesses->where('price', '>', (int)$price[0]);
            $businesses->where('price', '<', (int)$price[1]);
        }
        if (!empty($query['profit'])) {
            $profit = $query['profit'];
            $businesses->where('profit', '>', (int)$profit[0]);
            $businesses->where('profit', '<', (int)$profit[1]);
        }
        if (!empty($query['payback'])) {
            $payback = $query['payback'];
            $businesses->where('payback', '>', (int)$payback[0]);
            $businesses->where('payback', '<', (int)$payback[1]);
        }
        $responce = $businesses->paginate(6);
        return response()->json($responce);
    }

    public function getById(Business $business)
    {
        $data['options'] = $business->options;
        unset($business->options);
        $business->country_id = $business->country_id;
        $images               = $business->getMedia('business/' . auth()->user()->id);
        dd($images);
        $data['images'] = [];
        foreach ($images as $i => $image) {
            $data['images'][$i]['url']   = $image->getFullUrl();
            $data['images'][$i]['size']  = $image->size;
            $data['images'][$i]['image'] = 'business/' . auth()->user()->id . '/' . $image->file_name;
            $data['images'][$i]['type']  = $image->mime_type;
            $data['images'][$i]['name']  = $image->file_name;
        }
        $data['business'] = $business;

        return $data;
    }

    public function getCategories()
    {
        return BusinessCategory::all();
    }

    public function imageUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|image|max:2048'
        ]);

        $image = $request->file('file')->store('business/' . auth()->user()->id);

        return response(['message' => 'Изображение добавлено', 'image' => $image], 201);
    }

    public function imageRemove(Request $request)
    {
        $image = $request->get('image');
        $name = basename($image);
        $collection = dirname($image);
        $media = Media::where('collection_name',$collection)->where('file_name',$name)->first();
        if($media) {
            $media->delete();
        }
        Storage::delete($image);
        return response(['message' => 'Изображение удалено'], 201);
    }
}
