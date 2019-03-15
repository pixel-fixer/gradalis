<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewAddRequest;
use App\Models\Review\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    
    public function addReview( ReviewAddRequest $request )
    {
        $reviewData = $request->all();
        $review = Review::create($reviewData['review']);
    
        foreach ( $reviewData['files'] as $file ) {
            //TODO: Хак для пдф, переделать
            if (isset($file['dataURL'])) {
                $review->addMediaFromBase64(
                    $file['dataURL'],
                    [
                        'image/jpg',
                        'image/jpeg',
                    ]
                )
                ->toMediaCollection('review');
            }
        }
        if ( $review ) {
            return response()->json(['status' => 'ok']);
        }
        
        return response()->json(['status' => 'error']);
    }
    
    public function showReview( Request $request )
    {
        $id = $request['id'];
        $review = Review::where([
            ['id', $id],
            ['status', 4]
        ])->first();
        
        if ($review) {
            $review->main = $review->getFirstMediaUrl('review');
            return response()->json($review);
        }
        
        return response()->json(['status' => 'error']);
    }
}
