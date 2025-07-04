<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageContentResource extends JsonResource
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
            'type' => $this->type,
            'title' => $this->title,
            'content' => $this->content,
            'image_url' => $this->image_url,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,

            // Relationships (only shown when loaded)
            'why_girl' => new WhyGirlResource($this->whenLoaded('whyGirl')),
            // 'cambodia_content' => new NewContentResource($this->whenLoaded('CambodiaContent')),
            // 'new_contents' => NewContentResource::collection($this->whenLoaded('NewContent')),
            // 'about_contents' => AboutContentResource::collection($this->whenLoaded('AboutContent')),
        ];
    }
}
