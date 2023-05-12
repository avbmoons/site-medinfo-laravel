<?php

namespace App\Http\Requests\Receipts;

use App\Enums\ReceiptStatus;
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
            'patient_id' => ['required'],
            'doctor_id' => ['required'],
            'drug_id' => ['required'],
            'barcode' => ['required', 'string', 'min:2', 'max:200'],
            'status' => ['required', new Enum(ReceiptStatus::class)],
        ];
    }
}
