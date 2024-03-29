<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RetrievePostsTest extends TestCase
{
    use RefreshDatabase;
    public function testAUserCanRetrievePost()
    {

        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user, 'api');
        $posts = Post::factory(2)->create(
            [
                'user_id'=>$user->id,
            ]
        );

        $response = $this->get('/api/posts');
        $response->assertStatus(200)
            ->assertJson([

                'data' => [
                    [
                        'data' => [
                            'type' => 'posts',
                            'post_id' => $posts->last()->id,
                            'attributes' => [
                                'body' => $posts->last()->body,
                                'image'=>$posts->last()->image,
                                'posted_at'=>$posts->last()->created_at->diffForHumans(),
                            ]
                        ]
                    ],
                    [
                        'data' => [
                            'type' => 'posts',
                            'post_id' => $posts->first()->id,
                            'attributes' => [
                                'body' => $posts->first()->body,
                                'image'=>$posts->first()->image,
                                'posted_at'=>$posts->first()->created_at->diffForHumans(),
                            ]
                        ]
                    ]
                ],
                'links' => [
                    'self' => url('/posts'),
                ]
            ]);
    }

    public function testAUserCanOnlyRetrieveTheirPosts()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $posts = Post::factory()->create();

        $response = $this->get('/api/posts');

        $response->assertStatus(200)
            ->assertExactJson([
                'data' => [],
                'links' => [
                    "self" => url('/posts'),
                ]
            ]);
    }
}
