<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

class Post extends JsonResource
{

    //  this class wraps aroun the post model.
    public function toArray(Request $request): array
    {
        // returning the response from PostController
        return [
            'data'=>[
                'type'=>'posts',
                'post_id'=>$this->id,
                'attributes'=>[
                    'posted_by'=>new UserResource($this->user),
                    'body'=>$this->body,
                    'image'=>$this->image,
                    'posted_at'=>$this->created_at->diffForHumans(),
                ]
                ],
                'links'=>[
                    'self'=>url('/posts/'.$this->id)
                ],
        ];
    }
}
