<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'business.category_id'      => 'required',
            'business.country_id'    => 'required',
            'business.city_id'       => 'required',
            'business.name'          => 'required',
            'business.description'   => 'required',
            'business.payback'       => 'required',
            'business.price'         => 'required',
            'business.revenue'       => 'required',
            'business.profitability' => 'required',
            'business.district_id'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'business.category_id.required'      => 'Категория не выбранна',
            'business.country_id.required'    => 'Страна не выбранна',
            'business.city_id.required'       => 'Город не выбран',
            'business.name.required'          => 'Название бизнеса не указано',
            'business.description.required'   => 'Описание бизнеса не указано',
            'business.payback.required'       => 'Окупаемость бизнеса не указана',
            'business.price.required'         => 'Цена бизнеса не указана',
            'business.revenue.required'       => 'Доход бизнеса не указан',
            'business.profitability.required' => 'Рентабельность бизнеса не указана',
            'business.district_id.required'   => 'Регион не выбран',

        ];
    }
}
