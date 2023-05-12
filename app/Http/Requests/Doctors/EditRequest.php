<?php

declare(strict_types=1);

namespace App\Http\Requests\Doctors;

use App\Enums\DoctorStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class EditRequest extends FormRequest
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
            'surname' => ['required', 'string', 'min:2', 'max:200'],
            'speciality_id' => ['required'],
            'working_mode' => ['sometimes'],
            'status' => ['required', new Enum(DoctorStatus::class)],
        ];
    }
}
