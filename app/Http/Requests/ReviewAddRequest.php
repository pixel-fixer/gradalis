<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewAddRequest extends FormRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'review.phone'   => 'required|string|max:260',
            'review.email'   => 'required|string|max:260',
            'review.name'    => 'required|string|max:260',
            'review.company' => 'required|string|max:260',
            'review.article' => 'required|string|max:1500',
        ];
    }
    
    public function messages()
    {
        return [
            'review.phone.required'   => 'Заполните номер телефона',
            'review.email.required'   => 'Заполните email',
            'review.name.required'    => 'Заполните имя',
            'review.company.required' => 'Заполните компанию',
            'review.article.required' => 'Заполните отзыв',
        
        ];
    }
}
