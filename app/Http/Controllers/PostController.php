<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(){ 
        $data =  request()->validate([
            'data.attributes.body'=>''
        ]);
        $post = request()->user()->posts()->create(
            $data['data']['attributes']
        );
        // because this new PostResoucrce object is returned laravel get to know that something has been created and thus returns 201 code.
        return new PostResource($post);
    }
}
