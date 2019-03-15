<?php

namespace App\Http\Controllers;

use App\Models\Review\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index() {
        $reviews = Review::where('status', Review::STATUS_APPROVED)->paginate(6);
        //return var_dump($reviews);
        return view('reviews.reviews')->with('reviews', $reviews);
    }
}
