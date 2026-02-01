<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->PaymentId,
            'amount' => $this->Amount,
            'payment_date' => $this->PaymentDate,
            'method' => $this->PaymentMethod,
        ];
    }
}
