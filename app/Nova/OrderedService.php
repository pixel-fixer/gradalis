<?php

namespace App\Nova;

use DmitryBubyakin\NovaMedialibraryField\Fields\Medialibrary;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Treestoneit\BelongsToField\BelongsToField;

/**
 * @property object $service
 * @property string $name
 */
class OrderedService extends Resource
{
    public static $with = ['service', 'user'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Service\OrderedService';

    public function title()
    {
        return $this->service->name;
    }

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
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsToField::make('Услуга', 'service', Service::class),

            BelongsToField::make('Пользователь', 'user', User::class)->searchable(),

            Select::make('Статус', 'status')->options([
                0 => 'Не выбран',
                1 => 'Оплачена',
                2 => 'Подготовка',
                3 => 'В процессе',
                4 => 'Выполнена',
            ])->displayUsingLabels(),

            Text::make('Комментарий админа', 'admin_comment'),

            Text::make('Комментарий пользователя', 'user_comment'),

            Medialibrary::make('Докеументы юриста','ur_documents')->exceptOnForms(),

            Medialibrary::make('Докеументы бугалтера','buh_documents')->exceptOnForms(),
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

    public static function label()
    {
        return __('OrderedServices');
    }

    public static function singularLabel()
    {
        return __('OrderedService');
    }

    public static function group()
    {
        return __('Services');
    }
}
