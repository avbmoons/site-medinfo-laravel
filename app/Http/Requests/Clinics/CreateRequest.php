<?php

namespace App\Http\Requests\Clinics;

use App\Enums\ClinicStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:200'],
            'address' => ['required', 'string', 'min:2', 'max:200'],
            'phone' => ['required', 'string', 'min:5', 'max:200'],
            'email' => ['required', 'string', 'min:5', 'max:200'],
            'gps_coordinates' => ['required', 'string', 'min:5', 'max:200'],
            'working_modes' => ['required'],
            'organization_id' => ['required'],
            'organization_types_id' => ['required'],
            'status' => ['required', new Enum(ClinicStatus::class)],
        ];
    }
}
