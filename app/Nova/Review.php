<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use DmitryBubyakin\NovaMedialibraryField\Fields\Medialibrary;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Marketplace\Translatable\Translatable;
use App\Models\Review\Review as ModelReview;

class Review extends Resource
{
    
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = ModelReview::class;
    
    /**
     * The single value that should be used to represent the resource when
     * being displayed.
     *
     * @var string
     */
    public static $title = 'id';
    
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];
    
    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Reviews');
    }
    
    /**
     * Get the displayble singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Review');
    }
    
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function fields( Request $request )
    {
        return [
            ID::make()->sortable(),
            Text::make('Телефон', 'phone')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('E-mail', 'email')
                ->sortable()
                ->rules('required', 'max:255'),
            Translatable::make('Имя', 'name')
                        ->singleLine()
                        ->indexLocale('ru')
                        ->rules('required', 'max:255'),
            Translatable::make('Компания', 'company')
                        ->singleLine()
                        ->indexLocale('ru')
                        ->rules('required', 'max:255'),
            Translatable::make('Текст', 'article')
                        ->singleLine()
                        ->indexLocale('ru')
                        ->onlyOnForms()
                        ->rules('required', 'max:255'),
            Translatable::make('Видео(ссылка)', 'video_url')
                        ->singleLine()
                        ->indexLocale('ru')
                        ->onlyOnForms()
                        ->rules('max:255'),
            Medialibrary::make('Изображение','review')
                        ->relation('reviewMedia')
                        ->mediaOnIndex(),
            Select::make('Статус','status')
                  ->options(ModelReview::getStatuses())
                  ->hideWhenCreating()
                  ->displayUsingLabels()
                  ->rules('required'),
        ];
    }
    
    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function cards( Request $request )
    {
        return [];
    }
    
    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function filters( Request $request )
    {
        return [];
    }
    
    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function lenses( Request $request )
    {
        return [];
    }
    
    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function actions( Request $request )
    {
        return [];
    }
}
