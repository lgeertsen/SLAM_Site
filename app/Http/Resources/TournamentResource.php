<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TournamentResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'name' => $this->name,
        // 'sport' => $this->sport->name,
        'date' => $this->date,
        'teams' => Participant::collection($this->participants)
      ];
    }
}
