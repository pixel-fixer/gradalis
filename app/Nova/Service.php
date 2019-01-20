<?php

namespace App\Nova;

use Inspheric\Fields\Indicator;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Marketplace\Translatable\Translatable;
use Laravel\Nova\Fields\Text;
use Illuminate\Support\Facades\Cache;

class Service extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Service\Service';

//    public static $displayInNavigation = false;
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
        'id',
    ];

    public static function label()
    {
        return __('Services');
    }

    public static function singularLabel()
    {
        return __('Service');
    }

    public static function group()
    {
        return __('Services');
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

            Translatable::make(__('fields.title'), 'name')
                ->sortable()
                ->singleLine(),

            Indicator::make(__('fields.status'), 'status')->labels([
                0 => 'Не автивен',
                1 => 'Активен'
            ])->colors([
                0 => 'red',
                1 => 'green',
            ])->onlyOnIndex()->sortable(),

             Select::make(__('fields.status'), 'status')->options([
                 0 => trans('fields.status_disabled'),
                 1 => trans('fields.status_active')
             ])->displayUsingLabels()->onlyOnForms(),

            //Поле currency на винде не работает, поставил vyuldashev/nova-money-field
            Text::make(__('fields.price_pln'), 'price_pln')->resolveUsing(function($price){
                return number_format($price, 2, '.', ' ');
            }),

            Text::make(__('fields.price_eur'),'price_eur')->resolveUsing(function($price){
                return number_format($price, 2, '.', ' ');
            }),

            Text::make(__('fields.price_btc'), function (){
                $btc_eur = $this->getBtc();
                return number_format( $this->price_eur/$btc_eur, 6, '.', ' ');
            })
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

    /**
     * Возвращает курс btc к указанной валюте
     * @param string $currency
     * @return mixed
     */
    public function getBtc($currency = 'EUR')
    {
        $currencies = Cache::remember('btc', 60, function () use ($currency) {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://blockchain.info/ticker');
            $currencies = json_decode($response->getBody()->getContents(), true);
            return $currencies;
        });

        return $currencies[$currency]['last'];
    }

}
