<?php

namespace App\Http\Controllers;

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
        // ye neeche jaise data daala hai vaise bhi daal skte the
            //[ "body"=>$data['data']['attributes']['body'] ]
        
        return response([
            'data'=>[
                'type'=>'posts',
                'post_id'=>$post->id,
                'attributes'=>[
                    'body'=>$post->body
                ]
                ],
                'links'=>url('/posts'.$post->id),
        ],201); 
    }
}
