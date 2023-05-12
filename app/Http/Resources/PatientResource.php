<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'is_online' => $this->is_online,
            'name' => $this->name,
            'surname' => $this->surname,
            'barcode' => $this->barcode,
            'medical_card_stored_in_clinic_id' => $this->medical_card_stored_in_clinic_id,
        ];
    }
}
