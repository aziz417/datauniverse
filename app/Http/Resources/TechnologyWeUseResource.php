<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class TechnologyWeUseResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'image_url' => $this->images()->first()->url,
            'details' => route('api.technology-we-use.show', $this->slug),
            'web_image_url' => $this->images()->where('type', 'construction')->first()? $this->images()->where('type', 'construction')->first()->url : ''
        ];
    }
}
