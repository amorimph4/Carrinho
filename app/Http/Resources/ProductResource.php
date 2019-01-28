<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $productcategory = \App\ProductCategorys::where('product_id', '=', $this->id)->firstOrFail();
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'cost' => $this->cost,
            'feature' => $this->feature,
            'qtd' => $this->qtd,
            'category' => $productcategory->category,
        ];
    }
}
