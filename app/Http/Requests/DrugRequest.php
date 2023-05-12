<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class DrugRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description_url' => $this->description_url,
            ];
    }
}
