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
            'department_id' => $this->department_id,
            'faculty_id' => $this->faculty_id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'image' => $this->image,
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'head_description' => $this->head_description,
            'career' => $this->career,
            'scientific_interests' => $this->scientific_interests,
            'experience' => $this->experience,
            'word' => $this->word,
            'email' => $this->email,
            'certificates_title' => $this->certificates_title,
            'certificates_description' => $this->certificates_description,
            'cv' => $this->cv,
            'Researches_title' => $this->Researches_title,
            'Researches_description' => $this->Researches_description,
        ];
    }
}
