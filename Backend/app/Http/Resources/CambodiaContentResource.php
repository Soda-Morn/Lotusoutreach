<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CambodiaContentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'page' => $this->page ?? '',
            'title' => $this->title ?? '',
            'content' => $this->content ?? '',
            'image_url' => $this->image_url,
            'page_content_id' => $this->page_content_id,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
        ];
    }
}
