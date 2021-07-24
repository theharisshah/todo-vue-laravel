<?php

namespace Todo\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'item' => $this->item,
            'is_completed' => (bool) $this->is_completed,
            'created_at' => Carbon::parse($this->created_at)->toFormattedDateString()
        ];
    }
}
