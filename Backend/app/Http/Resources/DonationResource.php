<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonationResource extends JsonResource
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
            'amount' => $this->amount,
            'recurring' => $this->recurring,
            'command' => $this->command,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'country' => $this->country,
            'payment_method' => $this->payment_method,
            'programdetail_id' => $this->programdetail_id,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,

            // Relationship (optional)
            'program_detail' => new ProgramDetailResource($this->whenLoaded('programDetail')),
        ];
    }
}
