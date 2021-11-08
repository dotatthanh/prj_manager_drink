<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDrinkRequest extends FormRequest
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
            'name' => [
                'required', 'max:255',
                Rule::unique('types')->ignore($this->type),
            ],
            'description' => 'required',
            'type_id' => 'required',
            'avatar' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên đồ uống là trường bắt buộc.', 
            'name.max' => 'Tên đồ uống không được dài quá :max ký tự.', 
            'name.unique' => 'Tên đồ uống đã tồn tại.', 
            'description.required' => 'Mô tả là trường bắt buộc.',
            'type_id.required' => 'Loại đồ uống là trường bắt buộc.',
            'avatar.required' => 'Ảnh là trường bắt buộc.',
            'avatar.image' => 'Ảnh phải là hình ảnh (jpg, jpeg, png, bmp, gif, svg, webp).',
        ];
    }
}
