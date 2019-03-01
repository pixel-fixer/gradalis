<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\BooleanFilter;
use App\Models\Business\BusinessCategory;
use App\Models\Franchise\Franchise;
use App\Models\Business\Business;

class UserByBusinessCategory extends BooleanFilter
{

    public function name(){
        return __('Business category');
    }

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        $object__ids = collect($value)->filter(function ($item){
            return ($item);
        })->map(function ($item, $key){
            return $key;
        })->values()->toArray();

        //TODO или поменять название фильтра, или сделать опциональным.
        $query->whereHas('roles', function ($query){
            $query->where('name', 'Продавец');
        })
        ->where('user_id', $request->user()->id);


        if($object__ids) {
            return $query->whereHas('business.category', function ($query) use ($object__ids) {
                $query->whereIn('id', $object__ids);
            })->orWhereHas('franchise.category', function ($query) use ($object__ids) {
                $query->whereIn('id', $object__ids);
            });
        }else{
            return $query;
        }
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $categories = BusinessCategory::all()->mapWithKeys(function( $item){
            return [$item->name => $item->id];
        })->all();

        return $categories;
    }
}
