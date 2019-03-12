<?php

namespace App\Http\Controllers\News;

use App\Models\News\News;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data['news'] = News::where('url->'.app()->getLocale(), $slug)->first();
        return view('news.show',$data);
    }
}
