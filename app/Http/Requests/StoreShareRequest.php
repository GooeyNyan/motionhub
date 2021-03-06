<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreVideoRequest
 * @package App\Http\Requests
 */
class StoreShareRequest extends FormRequest
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
            'name' => 'required',
            'link' => 'required',
        ];
    }

    /**
     * custom error message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '标题不能为空',
            'link.required' => '视频链接不能为空',
        ];
    }
}
