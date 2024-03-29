<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostToTimelineTest extends TestCase
{
    use RefreshDatabase;
   public function testAUsetCanPostATextPost()
   {
    $this->withoutExceptionHandling();
    $user = User::factory()->create();

    $this->actingAs($user,'api');

    $response = $this->post('api/posts',[
        'data'=>[
            'type'=>'posts',
            'attributes'=>[
                'body'=>'Testing Body'
            ]
        ]
            ]);
    $post = Post::first();
    $this->assertCount(1,Post::all());
    $this->assertEquals($user->id,$post->user_id);
    $this->assertEquals('Testing Body',$post->body);
    
    $response->assertStatus(201)
    ->assertJson([
        'data'=>[
            'type'=>'posts',
            'post_id'=>$post->id,
            'attributes'=>[
                'posted_by'=>[
                    'data'=>[
                        'attributes'=>[
                            'name'=>$user->name,
                        ]
                    ]
                ],
                'body'=>'Testing Body'
            ]
            ],
            'links'=>[
                'self'=>url('/posts'.$post->id)
            ],
    ]);
   }
}
