<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class UserExceptionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'quantity' => $this->quantity,
            'small_text' => $this->small_text,
        ];
    }
}
