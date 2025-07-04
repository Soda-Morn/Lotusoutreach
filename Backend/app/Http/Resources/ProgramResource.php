<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'description'   => $this->description,
            'image_url'     => $this->image_url,
            'why_girls_id'  => $this->why_girls_id,
            'create_date'   => $this->create_date,
            'update_date'   => $this->update_date,
            // Related models (optional, uncomment if you want to include them)
            // 'why_girl'      => new WhyGirlResource($this->whenLoaded('whyGirl')),
            // 'program_details' => ProgramDetailResource::collection($this->whenLoaded('programDetail')),
            // 'partners'      => PartnerResource::collection($this->whenLoaded('partners')),
        ];
    }
}