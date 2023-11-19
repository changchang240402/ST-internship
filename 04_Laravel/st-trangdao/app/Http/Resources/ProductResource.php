<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this->product_id,
            'product_name' => $this->product_name,
            'company_id' => $this->company_id,
            'category_id' => $this->category_id,
            'amount' => $this->amount,
            'unit' => $this->unit,
            'price' => $this->price,
        ];
    }
}
