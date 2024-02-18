<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
  
    public function toArray(Request $request): array
    {

        // behind the scene laravel is using the App/http/Resource/Post.php to create this collection. 
        return [
            'data'=>$this->collection,
            'links'=>[
                'self'=>url('/posts'),
            ]
        ];
    }
}
