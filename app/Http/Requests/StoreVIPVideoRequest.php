<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreVideoRequest
 * @package App\Http\Requests
 */
class StoreVIPVideoRequest extends FormRequest
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
     * Get the validation rules that apply to the request.wod
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'rank' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'tb_link' => 'required',
            'download_link' => 'required',
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
            'rank.required' => '评级不能为空',
            'duration.required' => '视频时长不能为空',
            'price.required' => '价格不能为空',
            'tb_link.required' => '淘宝链接不能为空',
            'download_link.required' => '淘宝链接不能为空',
        ];
    }
}
