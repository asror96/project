<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Sanctum\Sanctum;
use Lcobucci\JWT\Token;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *  @param  string $token
     *
     */
    public function toArray( $token)
    {
        $data['email']=$token->email;
        $data['password']=$token->password;

        return [
            'access_token' => auth()->attempt($data),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
