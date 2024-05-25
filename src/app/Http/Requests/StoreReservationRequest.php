<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true;  // 認証を必要とする場合、ここでチェックを行います
    }

    public function rules()
    {
        return [
            'shop_id' => 'required|exists:shops,id',
            'date' => 'required|date',
            'time' => 'required',
            'number' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください。',
            'date.date' => '正しい日付を入力してください。',
            'time.required' => '時間を入力してください。',
            'number.required' => '人数を入力してください。',
            'number.integer' => '人数は整数で入力してください。',
            'number.min' => '人数は1以上で入力してください。',
        ];
    }
}