<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business\Business;
use App\Models\Franchise\Franchise;
use App\Models\Chat\Dialog;

class ObjectController extends Controller
{
    public function getStats($type, $id){

        switch ($type) {
            case 'business':
                $object = Business::where('id', $id)->withCount('request')->firstOrFail();
                $object_type = 'App\Models\Business\Business';
                break;
            
            case 'franchise':
                $object = Franchise::where('id', $id)->withCount('request')->firstOrFail();
                $object_type = 'App\Models\Franchise\Franchise';
                break;
            
            default:
                return response(['message' => 'wrong model type'], 400);
                break;
        }

        $dialog = Dialog::where('object_type',  $object_type)
            ->where('object_id',  $id)
            ->withCount('messages')
            ->get();

        $totalMessages = $dialog->reduce(function ($carry, $item) {
            return $carry + $item->messages_count;
        });

        $stats = [
            'showCount' => $object->show_count,
            'callsCount' => $object->calls_count,
            'requests' => $object->request_count ,
            'messages' => $totalMessages
        ];

        return $stats;
    }

    public function search($search = null)
    {
        $business = Business::with(['media'])->get(['id', 'name']);

        $franchise = Franchise::with(['media'])->get(['id', 'name']);

        //TODO смапить картинки

        return $business->concat($franchise);
    }
}
