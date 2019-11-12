<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PofDocumentStoreRequest extends FormRequest
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
            'year'                                  => 'required|numeric',
            'type'                                  => 'required|in:original,rectificado',
            'level_id'                              => 'required|exists:levels,id',
            'shift_id'                              => 'required|exists:shifts,id',
            'cue'                                   => 'required',
            'institution_id'                        => 'required|exists:institutions,id',
            'total_approved_teaching_positions'     => 'required',
            'total_approved_non_teaching_positions' => 'required',
            'total_teaching_approved_hours'         => 'required',
            'tmp_file'                              => 'required|mimes:pdf',
        ];
    }
}
