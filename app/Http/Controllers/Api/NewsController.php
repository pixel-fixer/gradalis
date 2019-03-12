<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\NewsCategory;
use DB;
use Illuminate\Http\Request;


class NewsController extends Controller
{

    public function get(Request $request)
    {
        $query = $request->all();

        $news = News::whereIn('status', [News::STATUS_APPROVED])->with(['category']);


        if (!empty($query['category'])) {
            $news->where('category_id', (int)$query['category']);
        }

        $response = $news->paginate(4);
        return response()->json($response);
    }

    public function getCategories()
    {
//        return NewsCategory::withCount('news')->get();
        $categories = NewsCategory::join('news', 'news.category_id', '=', 'news_category.id')
            ->groupBy('news_category.id')
            ->get([
                DB::raw('count(news.id) as count'),
                'news_category.id',
                'news_category.title',
                'news_category.icon'
            ]);
        return $categories;
    }

}
