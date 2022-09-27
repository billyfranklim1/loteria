<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Drawing;

class GetTicketResource extends JsonResource
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
            'name' => $this->name,
            'yourNumbers' => [$this->n1, $this->n2, $this->n3, $this->n4, $this->n5, $this->n6],
            'machineNumbers' => $this->status == 'pending' ? null : $this->getMachineNumbers(),
            'winner' => $this->status == 'win' ? true : false,
            'message' => $this->status == 'win' ? 'you won!' : ($this->status == 'pending' ? 'not yet' : 'you lost!')
        ];
    }


    public function getMachineNumbers()
    {
        $drawing = Drawing::find($this->drawing_id);

        if($drawing) {
            return [$drawing->n1, $drawing->n2, $drawing->n3, $drawing->n4, $drawing->n5, $drawing->n6];
        }

        return [];
    }
}
