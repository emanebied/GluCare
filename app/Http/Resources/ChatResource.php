<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'private' => $this->private,
            'direct_message' => $this->direct_message,
            'created_at' => $this->created_at,
            'participants' => $this->participants,
        ];
    }
}
