<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeEntryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            ...parent::toArray($request),

            'type' => JsonResource::make($this->whenLoaded('type')),
            'category' => JsonResource::make($this->whenLoaded('category')),
            'tags' => JsonResource::collection($this->whenLoaded('tags')),

            'date' => $this->date->toDateString(),
        ];
    }
}
