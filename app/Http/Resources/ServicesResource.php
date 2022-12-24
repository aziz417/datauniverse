<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'image_url' => $this->images()->first()->url,
            'web_image_url' => $this->images()->where('type', 'construction')->first()? $this->images()->where('type', 'construction')->first()->url : ''
        ];
    }
}
