<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCanViewProfileTest extends TestCase
{
    use RefreshDatabase;

    public function testAUserCanViewUserProfiles()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        // $posts = Post::factory()->create();

        $response = $this->get('/api/users/'.$user->id);

        $response->assertStatus(200)
        ->assertJson([
            'data'=>[
                'type'=>'users',
                'user_id'=>$user->id,
                'attributes'=>[
                    'name'=>$user->name,
                ]
                ],
                'links'=>[
                    'self'=>url('/users'.$user->id)
                ],
            ]);
        
    }
}
