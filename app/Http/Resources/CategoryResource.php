<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->CategoryId,
            'name' => $this->CategoryName,
            'created_at' => $this->CreatedAt,

            // Relationship (optional)
            'subcategories' => SubCategoryResource::collection($this->whenLoaded('subcategories')),
        ];
    }
}
