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
            'id'=> $this->id,
            'name'=> $this->name,
            'description'=> $this->description,
            'short_descripton'=>$this->short_description,
            'stock'=>$this->stock,
            'sku'=>$this->sku,
            'price'=>$this->price,
            'galery_images'=>$this->images 
        ];
    }
}
