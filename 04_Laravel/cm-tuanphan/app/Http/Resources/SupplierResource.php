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
        $supplier = parent::toArray($request);
        $hidden = ['created_at', 'updated_at', 'deleted_at'];
        $supplier = array_diff_key($supplier, array_flip($hidden));
        
        return [
            'supplier' => $supplier,
            'product_ids' => $this->products->pluck('product_id'),
        ];
    }
}
