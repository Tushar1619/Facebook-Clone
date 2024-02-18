<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as PostResource;
use App\Http\Resources\PostCollection;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        // dd($request->user());
        return new PostCollection($request->user()->posts);
    }
    public function store(Request $request){ 
        $data =  $request->validate([
            'data.attributes.body'=>''
        ]);
        $post = $request->user()->posts()->create(
            $data['data']['attributes']
        );
        // because this new PostResoucrce object is returned laravel get to know that something has been created and thus returns 201 code.
        return new PostResource($post);
    }
}
