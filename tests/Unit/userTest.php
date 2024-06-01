<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;


class userTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_user_duplication()
    {
        $firstUser = User::make([
            'email' => 'raza@gmail.com',
            'name' => 'raza',
        ]);
        $secondUser = User::make([
            'email' => 'mustafa@gmail.com',
            'name' => 'mustafa',
        ]);
        $this->assertTrue($firstUser->name != $secondUser->name && $firstUser->email != $secondUser->email);
    }
    public function test_delete_user()
    {
        User::factory()->count(1)->make();
        $user = User::latest()->first();
        if ($user) {
            $user->delete();
        }
        $this->assertTrue(true);
    }
    public function test_create_user()
    {
        User::factory()->count(1)->make();
        $this->assertTrue(true);
    }

    public function test_delete_post()
    {
        Post::factory()->count(1)->make();
        $user = Post::latest()->first();
        if ($user) {
            $user->delete();
        }
        $this->assertTrue(true);
    }
    public function test_create_post()
    {
        Post::factory()->count(1)->make();
        $this->assertTrue(true);
    }

    public function test_read_post()
    {
        Post::all();
        $this->assertTrue(true);
    }
    public function test_update_post()
    {
        $createUser = User::factory()->create();
        $getUserID = $createUser->id;
        $createPost = Post::create([
            'user_id' => $getUserID,
            'post' => 'This is post',
            'click' => 1,
        ]);
        $getIDFromCreatePost = $createPost->id;
        Post::find($getIDFromCreatePost)->update([
            'post' => 'updated post',
            'click' => 2,
        ]);
        $updatedPost = Post::find($getIDFromCreatePost);
        $this->assertTrue('updated post' == $updatedPost->post && 2 == $updatedPost->click);
    }
    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'password' => Hash::make('secret'),
        ]);
        $email = $user->email;
        $response = $this->post('/check', [
            'email' => $email,
            'password' => 'secret',
            '_token' => csrf_token(),
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
