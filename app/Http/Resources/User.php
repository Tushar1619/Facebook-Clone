<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'data'=>[
                'type'=>'users',
                'user_id'=>$this->id,
                'attributes'=>[
                    'name'=>$this->name
                ]
                ],
                'links'=>[
                    'self'=>url('/users/'.$this->id)
                ],
        ];
    }
}
