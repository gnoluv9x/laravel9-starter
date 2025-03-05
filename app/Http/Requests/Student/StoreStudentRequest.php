<?php

namespace App\Http\Requests\Student;

use App\Enum\Common\Gender;
use App\Enum\Students\StudentStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreStudentRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:10',
            ],
            'email' => [
                'required',
                'email',
                'unique:students,email'
            ],
            'status' => [
                'required',
                Rule::in(StudentStatus::asArray())
            ],
            'gender' => [
                'required',
                Rule::in(Gender::asArray())
            ],
            'course_id' => [
                'required',
                'exists:App\Models\Course,id'
            ],

        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute is required',
            'email' => 'Wrong format email',
            'min' => ':attribute at least :min chars',
            'max' => 'Not greater than :max chars',
            'exists' => ':attribute not exists',
            'unique' => ':Attribute is duplicated',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Name',
        ];
    }
}
