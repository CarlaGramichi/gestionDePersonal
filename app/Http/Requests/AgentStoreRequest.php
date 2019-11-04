<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentStoreRequest extends FormRequest
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
            'agent.name' => 'required',
            'agent.surname' => 'required',
            'agent.dni' => 'required',
            'agent.cuil' => 'required',
            'agent.born_date' => 'required',
            'agent.cellphone' => 'required',
            'agent.email' => 'email',
            'agent.address' => 'required',
            'agent.city' => 'required',
            'agent.state' => 'required',
            'agent.country' => 'required',

            'contact.name' => 'required',
            'contact.surname' => 'required',
            'contact.relationship_id' => 'required|exists:relationships,id',
            'contact.dni' => 'required',
            'contact.cellphone' => 'required',
            'contact.address' => 'required',
            'contact.city' => 'required',
            'contact.state' => 'required',
            'contact.country' => 'required'
        ];
    }
}
