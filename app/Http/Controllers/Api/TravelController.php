<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Travel\Travel;
use Illuminate\Support\Facades\Auth;
use App\Models\ObjectRequest;
use App\Models\Travel\TravelComment;
use App\Models\Travel\Flight;
use App\Models\Travel\Hotel;

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
        $travel->load(['hotels', 'meetings', 'flights', 'consultations', 'object_view', 'comments']);

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

    public function createComment(Request $request)
    {
        $data = $request->validate([
            'text' => 'required',
            'travel_id' => 'required'
        ]);

        TravelComment::create($data);

        return response(['message' => "Пожелание добавлено"]);
    }

    public function createFlight(Request $request)
    {
        $data = $request->validate([
            'out_city' => 'required',
            'in_city' => 'required',
            'out_time' => 'required',
            'in_time' => 'required',
            'flight_number' => 'required',
            'travel_id' => 'required'
        ]);
        $data['in_time'] = $data['in_time'].':00'; 
        $data['out_time'] = $data['out_time'].':00'; 
        Flight::create($data);

        return response(['message' => "Перелет добавлен"]);
    }

    public function createHotel(Request $request)
    {
        $data = $request->validate([
            'url' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'travel_id' => 'required'
        ]);
        $data['check_in_date'] = $data['check_in_date'].':00'; 
        $data['check_out_date'] = $data['check_out_date'].':00'; 
        Hotel::create($data);

        return response(['message' => "Перелет добавлен"]);
    }
}
