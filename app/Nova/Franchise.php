<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Marketplace\Translatable\Translatable;

class Franchise extends Resource
{

    /**
     * @return array|string|null
     */
    public static function group()
    {
        return __('Franchise');
    }

    //public static $displayInNavigation = false;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Franchise\Franchise';

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

    public static function label()
    {
        return __('Franchises');
    }

    /**
     * Get the displayble singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Franchise');
    }



    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $fields =  $this->getAdminFields();
        return $fields;
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

    protected function getUserFields(){
        return [
            ID::make()->sortable(),
            Text::make('Name')
                ->rules('required', 'max:255'),

            Trix::make('Description')
                ->hideFromIndex()
                ->rules('required'),

            BelongsTo::make('Category', 'category', 'App\Nova\FranchiseCategory'),

            HasMany::make('Packages', 'packages', 'App\Nova\FranchisePackage')
                ->withMeta([
                    'indexName' => __('Packages'),
                    'name' => __('Packages')
                ])->singularLabel(__('Package')),
        ];
    }
    protected function getAdminFields(){
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

            BelongsTo::make('Category', 'category', 'App\Nova\FranchiseCategory'),

            HasMany::make('Packages', 'packages', 'App\Nova\FranchisePackage')
                ->withMeta([
                    'indexName' => __('Packages'),
                    'name' => __('Packages')
                ])->singularLabel(__('Package')),
        ];
    }
}
