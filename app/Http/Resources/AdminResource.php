<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->AdminId,
            'name' => $this->Name,
            'first_name' => $this->FirstName,
            'last_name' => $this->LastName,
            'email' => $this->Email,
            'created_at' => $this->CreatedAt,
            'updated_at' => $this->UpdatedAt,
        ];
    }
}

