<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Business\Business;
use App\Models\Business\BusinessCategory;
use App\Models\Buyer;
use Illuminate\Http\Request;


class BusinessController extends Controller
{
    public function reserve(Request $request)
    {
        Buyer::where('status', 0)
            ->where('target_id', $request->get('id'))
            ->where('target_type', Business::class)
            ->delete();

        $business = Business::find($request->get('id'));
        $business->status = Business::STATUS_RESERVED;
        $business->save();
        $buyer = Buyer::create([
            'user_id' => auth()->user()->id,
            'status'  => 0
        ]);
        $business->buyer()->save($buyer);
    }

    public function get(Request $request)
    {
        $query = $request->all();

        $businesses = Business::whereIn('status', [Business::STATUS_SOLD_OUT, Business::STATUS_APPROUVED])->with(['city', 'city.country', 'category', 'favorites']);
        if (!empty($query['country'])) {
            $businesses->whereHas('city.country', function ($q) use ($query) {
                $q->where('id', (int)$query['country']);
            });
        }

        if (!empty($query['query'])) {
            $businesses->where('name', 'like', '%' . $query['query'] . '%');
        }

        if (isset($query['saled']) && $query['saled'] == "false") {
            $businesses->where('status', Business::STATUS_APPROUVED);
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
        $business->getMedia('business');
        $business->country_id = $business->city->country_id;
        $data['business'] = $business;

        return $data;
    }

    public function getCategories()
    {
        return BusinessCategory::all();
    }

    public function imageRemove(Request $request, Business $business)
    {
        $business->deleteMedia($request->get('id'));
        return response(['message' => 'Изображение удалено'], 201);
    }
}
