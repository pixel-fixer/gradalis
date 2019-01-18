<?php

namespace App\Nova\Lenses;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Lenses\Lens;
use Laravel\Nova\Http\Requests\LensRequest;
use DB;

class SellersList extends Lens
{
    /**
     * Get the query builder / paginator for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\LensRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public static function query(LensRequest $request, $query)
    {
        return $request->withOrdering($request->withFilters(
            $query->select([
                'users.id',
                DB::raw("concat(first_name, ' ', first_name) as name"),
                'users.phone',
                'users.email'
            ])
        ));
    }

    /**
     * Get the fields available to the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make('ID', 'id')->sortable(),
            Text::make('name')->sortable(),
            Text::make('phone'),
            Text::make('email')->sortable(),
            Text::make('user_led_id', function (){
                return 'Ответственный';
            })->canSee(function ($request) { //Поле "ответственный/кто привел. Может видеть админ и главный брокер"
                //TODO Добавить главного брокера к миграциям
                return $request->user()->hasAnyRole(['Админ','Главный брокер']);
            }),
            Text::make('chat_link', function (){
                return "<a href=''>ссылка на чат с продавцом</a>";
            })->asHtml()

        ];
    }

    /**
     * Get the filters available for the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new \App\Nova\Filters\UserByCategory
        ];
    }

    /**
     * Get the URI key for the lens.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'sellers-list';
    }
}
