<?php

namespace App\Nova;

use Treestoneit\BelongsToField\BelongsToField;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Lang;

//TODO показывать только брокерам покупателям и главным брокерам!
class BuyerList extends Resource
{
    public static $model = 'App\Models\Auth\User';

    public static $title = 'id';

    public static $search = [
        'id', 'first_name','last_name', 'email', 'phone', 'note'
    ];

    public static $with = ['city.country'];

    public static function label()
    {
        return 'Список покупателей';
    }

    public static function singularLabel()
    {
        return __('User');
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {

        /*
         * Cписок ПОКУПАТЕЛЕЙ, которые принадлежат текущему Брокеру-покупателю
         * TODO проверить доступ к этому ресурсу
         */

        return $query->whereHas('roles', function ($query){
            $query->where('name', 'Покупатель');
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
            ID::make()->sortable()->onlyOnIndex(),

            Text::make(__('fields.full_name'), 'full_name')->onlyOnIndex(),

            Text::make(__('fields.email'), 'email')->onlyOnIndex(),

            Text::make(__('fields.phone'), 'phone')->onlyOnIndex(),

            Text::make(__('fields.country'), 'Country', function (){
                if($this->city)
                    return $this->city->country->translation;
                else
                    return '';
            })->onlyOnIndex(),

            //TODO добавить ссылку, когда чат будет полностью готов
            Text::make(__('fields.chat'), function (){
                return '<a href="">Ссылка на чат</a>';
            })->asHtml()->onlyOnIndex(),

            Text::make(__('fields.note'), 'note')->onlyOnIndex(),

            Textarea::make(__('fields.note'), 'note')->onlyOnForms()

            //BelongsToField::make(__('City'),'city', City::class)->onlyOnIndex()
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
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
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
