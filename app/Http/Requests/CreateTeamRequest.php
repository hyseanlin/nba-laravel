<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeamRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:100',
            'zone' => 'required|string|min:2|max:100',
            'city' => 'required|string|min:2|max:100',
            'home' => 'required|string|min:2|max:100'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "球隊名稱 為必填",
            "name.min" => "球隊名稱 至少需2個字元",
            "zone.required" => "分區 為必填",
            "zone.min" => "分區 至少需2個字元",
            "city.required" => "城市 為必填",
            "city.min" => "城市 至少需2個字元",
            "home.required" => "主場 為必填",
            "home.min" => "主場 至少需2個字元",
        ];
    }
}
