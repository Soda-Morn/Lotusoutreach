<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'program_id' => $this->program_id,
            'description' => $this->description,

            // Appended Attributes
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,

            // Relationships
            // 'program' => new ProgramResource($this->whenLoaded('program')),
            // 'donations' => DonationResource::collection($this->whenLoaded('donation')),
        ];
    }
}
