<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->OrderId,
            'customer_id' => $this->CustId,
            'order_date' => $this->OrderDate,
            'total_amount' => $this->TotalAmount,
            'status' => $this->Status,
            'payment_id' => $this->PaymentId,

            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'items' => OrderItemResource::collection($this->whenLoaded('items')),
            'payment' => new PaymentResource($this->whenLoaded('payment')),
        ];
    }
}
