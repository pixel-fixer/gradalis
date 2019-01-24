<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Treestoneit\BelongsToField\BelongsToField;
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

            Text::make(__('User'), function(){
                return $this->user->full_name;
            })->onlyOnIndex(),

            BelongsToField::make(__('User'), 'user', 'App\Nova\User')->onlyOnForms()->searchable(),

            DateTime::make(__('fields.created_at'), 'created_at')
                ->format('DD-MM-YYYY')
                ->sortable(),

            //TODO может быть это поле должно быть text?
            Textarea::make('Комментарий пользователя о встречах', 'user_meeting_comment'),

            //TODO может быть это поле должно быть text?
            Textarea::make('Комментарий пользователя о консультациях', 'user_consult_comment'),

            HasMany::make(__('Flights'), 'flights', Flight::class),

            HasMany::make(__('Hotels'), 'Hotels', Hotel::class),

            HasMany::make(__('Meetings'), 'Meetings', Meeting::class),

            HasMany::make(__('Consultations'), 'Consultations', Consultation::class),
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
