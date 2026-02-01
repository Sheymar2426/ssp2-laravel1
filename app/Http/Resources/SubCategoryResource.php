<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->SubCategoryId,
            'name' => $this->SubCategoryName,
            'category_id' => $this->CategoryId,
            'created_at' => $this->CreatedAt,
        ];
    }
}

