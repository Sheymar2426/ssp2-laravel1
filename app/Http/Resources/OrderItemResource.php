<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'order_id' => $this->OrderId,
            'product_id' => $this->ProductId,
            'quantity' => $this->Quantity,
            'price' => $this->Price,

            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
