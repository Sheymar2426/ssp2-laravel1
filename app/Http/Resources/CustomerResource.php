<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->CustId,
            'name' => $this->Name,
            'phone' => $this->Phone,
            'email' => $this->Email,
            'created_at' => $this->CreatedAt,
            'updated_at' => $this->UpdatedAt,
        ];
    }
}

