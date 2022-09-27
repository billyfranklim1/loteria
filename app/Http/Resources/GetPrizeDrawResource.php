<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\PrizeDraw;

class GetPrizeDrawResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        self::$wrap = null;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'machineNumbers' => $this->status !== PrizeDraw::STATUS_FINISHED ? null : [$this->n1, $this->n2, $this->n3, $this->n4, $this->n5, $this->n6],
        ];
    }

}
