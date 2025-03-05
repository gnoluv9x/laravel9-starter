<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:10',
                Rule::unique(Course::class)->ignore($this->route('course')->id),
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Trường :attribute là bắt buộc',
            'min' => 'Trường :attribute ít nhất :min ký tự',
            'max' => 'Trường :attribute nhiều nhất :max ký tự',
            'unique' => ':attribute đã tồn tại'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'họ và tên'
        ];
    }
}
