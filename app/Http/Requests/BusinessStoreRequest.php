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
            'category'      => 'required',
            'country_id'    => 'required',
            'city_id'       => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'payback'       => 'required',
            'price'         => 'required',
            'revenue'       => 'required',
            'profitability' => 'required',
            'district_id'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category.required'      => 'Категория не выбранна',
            'country_id.required'    => 'Страна не выбранна',
            'city_id.required'       => 'Город не выбран',
            'name.required'          => 'Название бизнеса не указано',
            'description.required'   => 'Описание бизнеса не указано',
            'payback.required'       => 'Окупаемость бизнеса не указана',
            'price.required'         => 'Цена бизнеса не указана',
            'revenue.required'       => 'Доход бизнеса не указан',
            'profitability.required' => 'Рентабельность бизнеса не указана',
            'district_id.required'   => 'Регион не выбран',

        ];
    }
}
