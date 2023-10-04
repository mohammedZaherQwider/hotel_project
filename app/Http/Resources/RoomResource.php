<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' =>$this->id ,
            'name' =>$this->name,
            'descripitoin'=>$this->descripitoin,
            'room_type_id'=>new RoomTypeResource( $this->roomType),
            'hotel_id'=>new HotelResource($this->hotel),
            'images'=> ImageResource::collection($this->images)
        ];
    }
}
