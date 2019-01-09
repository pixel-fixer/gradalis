<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;

class Travel extends Resource
{
    public static $with = ['ordered_service', 'user', 'flights', 'hotels', 'meetings', 'consultations'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Travel\Travel';

    /**
     * The single value that should be used to represent the resource when being displayed.
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
        return __('Travels');
    }

    public static function singularLabel()
    {
        return __('Travel');
    }
    /**
     * @return array|string|null
     */
    public static function group()
    {
        return __('Other');
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

            BelongsTo::make('user'),

            Text::make('name', function(){
                return $this->user->first_name.' '.$this->user->last_name;
            }),

            DateTime::make('created_at')
                ->format('DD-MM-YYYY')
                ->sortable(),

            //TODO может быть это поле должно быть text?
            Textarea::make('user_meeting_comment'),

            //TODO может быть это поле должно быть text?
            Textarea::make('user_consult_comment'),

            HasMany::make('Flights'),

            HasMany::make('Hotels'),

            HasMany::make('Meetings'),

            HasMany::make('Consultations'),
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
