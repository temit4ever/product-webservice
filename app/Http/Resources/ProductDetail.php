<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = $this[$request->slug];
        return [
            'name' => !empty($data['name']) ? filter_var($data['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW) : '',
            'description' => !empty($data['description']) ? filter_var($data['description'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW) : '',
            'type' => !empty($data['type']) ? filter_var($data['type'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW) : '',
            'suppliers' => !empty($data['suppliers']) ? implode(', ', $data['suppliers']) : '',
        ];
    }
}
