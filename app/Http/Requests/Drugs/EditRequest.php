<?php

declare(strict_types=1);

namespace App\Http\Requests\Drugs;

use App\Enums\DrugStatus;
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
            'description_url' => ['required', 'string', 'min:4', 'max:200'],
            'status' => ['required', new Enum(DrugStatus::class)],
        ];
    }
}
