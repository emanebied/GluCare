<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MassageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'message' => $this->message,
            'chat_id' => $this->chat_id,
            'user_id' => $this->user_id,
            'data' => json_decode($this->data),
            'created_at' => $this->created_at,
            'sender' => $this->sender,
        ];
    }
}
