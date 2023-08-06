<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BallsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = request()->method();

        $rule = [
            'color' => ['required', 'string', 'max:191'],
            'volume' => ['required', 'numeric']
        ];

        $id = request()->route('ball');
        
        switch (strtoupper($method)){
            case 'POST':
                $rule['name'] = ['required', 'string', 'max:255', Rule::unique('balls')];
                break;

            case 'PATCH':
            case 'PUT':
                $rule['name'] = ['required', 'string', 'max:255', Rule::unique('balls')->ignore($id)];
                break;

        }
        return $rule;
    }
}
