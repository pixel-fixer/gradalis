<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Travel\Travel;
use Illuminate\Support\Facades\Auth;
use App\Models\ObjectRequest;

class TravelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function list()
    {
        return Travel::where('user_id', Auth::id())
        ->with('object_view')
        ->get(); 
    }

    public function get(Travel $travel)
    {
        $travel->load(['hotels', 'meetings', 'flights', 'consultations', 'object_view']);

        return $travel;
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'date' => 'required'
        ]);

        $data['user_id'] = Auth::id();
        
        Travel::create($data);

        return response(['message' => "Поездка создана"]);
    }

    public function createObjectView(Request $request)
    {
        $data = $request->validate([
            'date' => 'required',
            'time' => 'required',
            'object_id' => 'required',
            'object_type' => 'required',
            'travel_id' => 'required',
            'buyer_comment' => 'required'
        ]);

        switch ($data['object_type']) {
            case 'business':
                $data['object_type'] = 'App\Models\Business\Business';
                break;
            
            case 'franchise':
                $data['object_type'] = 'App\Models\Franchise\Franchise';
                break;
            
            default:
                return response(['message' => 'wrong object type'], 400);
                break;
        }
        

        $data['view_at'] = $data['date'].' '.$data['time'].':00';
        $data['user_id'] = Auth::id();
        $data['type'] = ObjectRequest::TYPE_VIEW;

        ObjectRequest::create($data);

        return response(['message' => "Запрос на просмотр отправлен"]);
    }
}
