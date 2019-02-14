<?php

namespace App\Nova;

use Treestoneit\BelongsToField\BelongsToField;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Password;
use App\Nova\CustomRole as Role;
use App\Nova\CustomPermission as Permission;
use KABBOUCHI\NovaImpersonate\Impersonate;

/**
 * @property string $first_name
 * @property string $last_name
 */
class User extends Resource
{

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\Auth\\User';

    public function title()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'first_name','last_name', 'email','phone','balance','active','sum_from','sum_to','purchase_date_from','purchase_date_to'
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['city'];

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Users');
    }

    /**
     * Get the displayble singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('User');
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

            Gravatar::make(),
            
            Text::make('First name', 'first_name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Last name', 'last_name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make(__('User Table Phone'), 'phone')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make(__('User Table Email'), 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),
            Date::make(__('User Create Date'), 'created_at')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Select::make(__('User Table Active'), 'active')->options([
                '0' => 'Заблокирован',
                '1' => 'Активен',
            ])->displayUsingLabels()
              ->sortable(),

            Password::make(__('User Table Password'), 'password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:6')
                ->updateRules('nullable', 'string', 'min:6'),

            BelongsToField::make(__('City'),'city', City::class)->searchable(),

            Impersonate::make($this),

            MorphToMany::make('Роль', 'roles', Role::class),
            MorphToMany::make('Разрешение', 'permissions', Permission::class),
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
