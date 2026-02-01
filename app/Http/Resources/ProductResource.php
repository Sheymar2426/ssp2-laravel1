<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->ProductId,
            'name' => $this->Name,
            'description' => $this->Description,
            'price' => $this->Price,
            'stock' => $this->Stock,
            'image' => $this->Image,
            'category_id' => $this->CategoryId,
            'subcategory_id' => $this->SubCategoryId,

            'category' => new CategoryResource($this->whenLoaded('category')),
            'subcategory' => new SubCategoryResource($this->whenLoaded('subcategory')),
        ];
    }
}
