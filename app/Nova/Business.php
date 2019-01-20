<?php

namespace App\Nova;

use Treestoneit\BelongsToField\BelongsToField;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Marketplace\Translatable\Translatable;
use App\Models\Business\Business AS BusinessModel;

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
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['category','city','user'];

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
            Translatable::make('Наименование','name')
                ->singleLine()
                ->indexLocale('ru')
                ->rules('required', 'max:255'),

            Translatable::make('Описание','description')
                ->trix()
                ->indexLocale('ru')
                ->hideFromIndex()
                ->rules('required', 'max:255'),
            Number::make('Цена','price')
                ->rules('required'),

            Number::make('Рентабельность','profitability')
                ->hideFromIndex()
                ->rules('required'),

            Number::make('Прибыль','profit')
                ->hideFromIndex()
                ->rules('required'),

            Number::make('Окупаемость','payback')
                ->hideFromIndex()
                ->rules('required'),

            Select::make('Статус','status')
                ->options(BusinessModel::getStatuses())
                ->hideWhenCreating()
                ->displayUsingLabels()
                ->rules('required'),

            Select::make('Процент','percent')
                ->hideWhenCreating()
                ->rules('required'),

            Number::make('Комиссия','commission')
                ->hideWhenCreating()
                ->rules('required'),

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

            BelongsToField::make('Категория', 'category', 'App\Nova\BusinessCategory')->searchable(false),
            BelongsToField::make('Город', 'city', 'App\Nova\City'),
            BelongsToField::make('Пользователь','user', 'App\Nova\User')
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
