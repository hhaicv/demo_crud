<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'developer' => 'required',
            'release_year' => 'required',
            'genre' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => "Bạn chưa nhập tiêu đề",
            'developer.required' => "Bạn chưa nhập lập trình viên",
            'release_year.required' => "Bạn chưa nhập năm sản xuất",
            'genre.required' => "Bạn chưa nhập thể loại",
        ];
    }
}
