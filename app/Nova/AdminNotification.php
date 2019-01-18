<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Http\Requests\NovaRequest;
use Inspheric\Fields\Indicator;

class AdminNotification extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\AdminNotification';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'text';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    public static function label()
    {
        return trans('fields.notifications');
    }

    public static function singularLabel()
    {
        return  trans('fields.notification');
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

            Text::make(trans('fields.text'),'text')->onlyOnIndex(),

            Textarea::make(trans('fields.text'),'text')->onlyOnForms(),

            Text::make(trans('fields.action_link'),'action_link')->asHtml(),

            Select::make(trans('fields.status'), 'status')->options([
                'new' => trans('fields.admin_notifications.new'),
                'read' => trans('fields.admin_notifications.read'),
                'done' => trans('fields.admin_notifications.done')
            ])->displayUsingLabels()->onlyOnForms(),

            Indicator::make(trans('fields.status'),'status')->labels([
                'new' => trans('fields.admin_notifications.new'),
                'read' => trans('fields.admin_notifications.read'),
                'done' => trans('fields.admin_notifications.done')
            ])->colors([
                'new' => 'blue',
                'read' => 'yellow',
                'done' => 'green'
            ])->onlyOnIndex()->sortable(),

            DateTime::make(trans('fields.updated_at'), 'updated_at')->onlyOnIndex()->sortable(),

            DateTime::make(trans('fields.created_at'), 'created_at')->onlyOnIndex()->sortable()
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
