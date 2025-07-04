<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WhyGirlResource extends JsonResource
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
            'page' => $this->page,
            'title' => $this->title,
            'content' => $this->content,
            'image_url' => $this->image_url,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,

            // Relationships
            // 'page_content' => new PageContentResource($this->whenLoaded('pageContent')),
            // 'programs' => ProgramResource::collection($this->whenLoaded('program')),
        ];
    }
}
