<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use MrMonat\Translatable\Translatable;

class Business extends Resource
{

    //public static $displayInNavigation = false;

    /**
     * @return array|string|null
     */
    public static function group()
    {
        return __('Business');
    }

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Business\Business';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Businesses');
    }

    /**
     * Get the displayble singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Business');
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

            Translatable::make('Name')
                ->singleLine()
                ->indexLocale('ru')
                ->rules('required', 'max:255'),

            Translatable::make('Description')
                ->trix()
                ->indexLocale('ru')
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Translatable::make('Seo_Title')
                ->singleLine()
                ->indexLocale('ru')
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Translatable::make('Seo_Description')
                ->indexLocale('ru')
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Translatable::make('Seo_Keywords')
                ->singleLine()
                ->indexLocale('ru')
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            BelongsTo::make('Category', 'category', 'App\Nova\BusinessCategory'),
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
