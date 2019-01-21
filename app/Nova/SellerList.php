<?php

namespace App\Nova;

use Treestoneit\BelongsToField\BelongsToField;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class SellerList extends Resource
{

    public static $model = 'App\Models\Auth\User';

    public static $title = 'id';

    public static $search = [
        'id', 'first_name','last_name', 'email','phone','balance','active','sum_from','sum_to','purchase_date_from','purchase_date_to'
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['city'];

    public static function label()
    {
        return 'Список продавцов';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->whereHas('roles', function ($query){
            $query->where('name', 'Продавец');
        })->where('broker_id', $request->user()->id);
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make(__('fields.full_name'), function(){
                return $this->full_name;
            })->onlyOnIndex(),

            Text::make(__('fields.email'), 'email')->sortable()->onlyOnIndex(),

            Text::make(__('fields.phone'), 'phone')->onlyOnIndex(),

            Text::make(__('fields.business_category'), function (){
                $categories = $this->business->map(function($item){
                    return $item->category->translation;
                })->unique()->values();
                return implode(', ', $categories->toArray());
            })->onlyOnIndex(),

            //Кто привел / ответственный
            //TODO Добавить миграцию в юзера
            Text::make(__('fields.user_ref_id'), function (){
                return 'Ответственный';
            })->canSee(function ($request) {
                //TODO Добавить главного брокера к миграциям
                return $request->user()->hasAnyRole(['Админ','Главный брокер']);
            })->onlyOnIndex(),

            Text::make(__('fields.chat_link'), 'chat_link', function (){
                return "<a href=''>ссылка на чат с продавцом</a>";
            })->asHtml(),

            Text::make(__('fields.note'), 'note')->onlyOnIndex(),

            Textarea::make(__('fields.note'), 'note')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new Filters\UserByBusinessCategory,
           // new Filters\UserType
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [
            //new Lenses\SellersList
        ];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
