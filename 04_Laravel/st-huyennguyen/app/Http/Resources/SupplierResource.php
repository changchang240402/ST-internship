<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
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
            'company_id' => $this->company_id,
            'company_name' => $this->company_name,
            'transaction_name' => $this->transaction_name,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone,
            'fax' => $this->fax,
            'products' => ProductResource::collection($this->products),
        ];
    }
}
