<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "phoneNumber" => $this->phone_number,
            "countryCode" => $this->country_code,
            "countryIsoCode" => $this->country_iso_code,
            "profilePicture" => $this->profile_picture,
            "joinedOn" => $this->created_at,
        ];
    }
}
