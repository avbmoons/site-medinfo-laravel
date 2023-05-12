<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
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
            'working_mode' => $this->working_mode,
            'is_online' => $this->is_online,
            'speciality_id' => $this->speciality_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'education_organization_id' => $this->education_organization_id,
            'status_id' => $this->status_id,
        ];
    }
}
