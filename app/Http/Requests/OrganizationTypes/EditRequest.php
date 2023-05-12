<?php

declare(strict_types=1);

namespace App\Http\Requests\OrganizationTypes;

use App\Enums\OrganizationTypeStatus;
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
            'organizationType' => ['required', 'string', 'min:3', 'max:200'],
            'description' => ['required', 'string'],
            'status' => ['required', new Enum(OrganizationTypeStatus::class)],
        ];
    }
}
