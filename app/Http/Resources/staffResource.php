<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'position' => $this->position,
            'category' => $this->category ?? null,
            'email' => $this->email,
            'cv' => $this->cv,
            'description' => $this->description ?? null,
            'word' => $this->word ?? null,
            'user_id' => $this->user_id,
            'faculty_id' => $this->faculty_id,
            'department_id' => $this->department_id,
            'researches' => $this->researches ?? null,
            'certificates' => $this->researches ?? null,
            'staffSocial' => $this->researches ?? null,
            'studyPlan' => $this->researches ?? null,
        ];
    }
}
