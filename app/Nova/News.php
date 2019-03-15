<?php

namespace App\Nova;


use DmitryBubyakin\NovaMedialibraryField\Fields\Medialibrary;
use Treestoneit\BelongsToField\BelongsToField;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Marketplace\Translatable\Translatable;
use App\Models\News\News AS NewsModel;

class News extends Resource
{

    //public static $displayInNavigation = false;

    /**
     * @return array|string|null
     */
    public static function group()
    {
        return __('News');
    }

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\News\News';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['category'];

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('News');
    }

    /**
     * Get the displayble singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('News');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $locale = app()->getLocale();
        return [
            ID::make()->sortable(),

            Translatable::make('Наименование','title')
                ->singleLine()
                ->indexLocale($locale)
                ->rules('required', 'max:255'),

            Translatable::make('Url','url')
                ->singleLine()
                ->indexLocale($locale)
                ->rules('required', 'max:255'),

            Translatable::make('Описание','description')
                ->trix()
                ->indexLocale($locale)
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Translatable::make('Видео','video')
                ->indexLocale($locale)
                ->hideFromIndex(),

            Medialibrary::make('Изображение','news')
                ->relation('newsMedia')
                ->mediaOnIndex(),

            Select::make('Статус','status')
                ->options(NewsModel::getStatuses())
                ->hideWhenCreating()
                ->displayUsingLabels()
                ->rules('required'),

            Translatable::make('Seo_Title')
                ->singleLine()
                ->indexLocale($locale)
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Translatable::make('Seo_Description')
                ->indexLocale($locale)
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Translatable::make('Seo_Keywords')
                ->singleLine()
                ->indexLocale($locale)
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            BelongsToField::make('Категория', 'category', 'App\Nova\NewsCategory')
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
