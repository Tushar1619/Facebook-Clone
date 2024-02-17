<?php

namespace Tests\Feature;

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
                'body'=>'This is body'
            ]
        ]
            ]);
    $post = \App\Models\Post::first();
    $response->assertStatus(201);
   }
}
