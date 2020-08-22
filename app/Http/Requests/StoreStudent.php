<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreStudent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->id) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $studentId = '';
        if ($this->student) {
            $studentId = "," . $this->student->id;
        }
        return [
            'name' => 'required',
            'identification' => "required|max:8|min:8|unique:students,identification{$studentId}"
        ];
    }
}
