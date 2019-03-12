<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Treestoneit\BelongsToField\BelongsToField;
use Inspheric\Fields\Indicator;

class Message extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Chat\Message';

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
        'id', 'dialog.users.email'
    ];

    public static $with = ['from', 'dialog.users', 'dialog.object'];

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

            // Text::make('От', function(){
            //     $html = 
            //     return $this->from->full_name;
            // })->onlyOnIndex(),

            Indicator::make(__('fields.status'), 'status')->labels([
                0 => 'На модерации',
                1 => 'Активно'
            ])->colors([
                0 => 'orange',
                1 => 'green'
            ])->onlyOnIndex()->sortable(),

            BelongsTo::make('От', 'from', 'App\Nova\User')->searchable(),

            Text::make('Участники диалога', function(){
                $html = '';

                // return $this->dialog->users;
                foreach($this->dialog->users as $user){
                    $html .= "<a href='/nova/resources/users/$user->id'>";
                    if($user->avatar)
                        $html .= "<img style='vertical-align:middle' src='$user->avatar'>";
                    else
                        $html .= "<img style='vertical-align:middle' src='/svg/icons/ic_login.svg'>";
                    
                    // $html .= "$user->full_name</a> ";
                    $html .= "</a> ";
                }
                return $html;
            })->asHtml(),

            Text::make('Тема', function(){
                return $this->dialog->id."--".$this->dialog->theme;
            })->asHtml(),

            Text::make('Объект', function(){
                if(isset($this->dialog->object)){

                    $link = '';
                    if($this->dialog->object_type == "App\Models\Business\Business")
                        $link = "/nova/resources/businesses/".$this->dialog->object_id."/edit";
                    if($this->dialog->object_type == "App\Models\Business\Franchise")
                        $link = "/nova/resources/franchise/".$this->dialog->object_id."/edit";

                    return  "<a href='$link'>".$this->dialog->object->name."</a>";
                }else{
                    return '-';
                }
            })->asHtml(),


            Text::make('Text', 'text'),

            Text::make('Язык', 'locale')->sortable(),

            Text::make('Город(geoip)', function(){
                return $this->ip_info['country'].', '.$this->ip_info['city'];
            }),

            Date::make('Создано', 'created_at')
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
