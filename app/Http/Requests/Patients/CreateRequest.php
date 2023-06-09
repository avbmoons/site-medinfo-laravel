<?php

declare(strict_types=1);

namespace App\Http\Requests\Patients;

use App\Enums\PatientStatus;
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
            'name' => ['required', 'string', 'min:5', 'max:200'],
            'surname' => ['required', 'string', 'min:5', 'max:200'],
            'barcode' => ['required', 'string', 'min:10'],
            'status' => ['required', new Enum(PatientStatus::class)],
            'insurance' => ['sometimes'],
        ];
    }
}
