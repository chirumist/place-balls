<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BucketRequest extends FormRequest
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
            'total_volume' => ['required', 'numeric']
        ];

        $id = request()->route('bucket');

        switch (strtoupper($method)){
            case 'POST':
                $rule['name'] = ['required', 'string', 'max:255', Rule::unique('buckets')];
                break;

            case 'PATCH':
            case 'PUT':
                $rule['name'] = ['required', 'string', 'max:255', Rule::unique('buckets')->ignore($id)];
                break;

        }
        return $rule;
    }
}
