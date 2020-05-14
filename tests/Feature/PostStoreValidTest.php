<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostStoreValidTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function testPostStoreValid()
	{
		$data = [
			'postname' => 'post store test',
			'password' => 'password for test',
			'description' => 'description for test',
			'status' => 'status for test'
		];
		$this->post('/posts', $data)
			->assertStatus(302)
			->assertSessionHas('status');
		$this->assertEquals(session('status'), 'Post Added Succesfly...!');

	}
	public function testPostStoreFailure()
	{
		$data = [
			'postname' => '',
			'description' => ''
		];
		$this->post('/posts', $data)
			 ->assertStatus(302)
			 ->assertSessionHAs('errors');
		$messages = session('errors')->getMessages();
		$this->assertEquals($messages['postname'][0], 'The postname field is required.');
		$this->assertEquals($messages['description'][0], 'The description field is required.');
	}
	public function testPostUpdate()
	{
		$post = new Post();
		$post->postname = 'updated postname test';
		$post->description = 'description test';
		$post->password = 'password for test';
		$post->status = 'test status';
		$post->save();
		$this->assertDatabaseHas('posts', $post->toArray());

		$data = [
			'postname' => 'second post update',
			'description' => 'second description',
			'password' => 'second password',
			'status' => 'second status'
		];
		$this->put("/posts/{$post->id}", $data)
			 ->assertStatus(302)
			 ->assertSessionHas('status');

		$this->assertDatabaseHas('posts', [
			'postname' => 'second post update',
			'description' => 'second description'
		]);

		$this->assertDatabaseMissing('posts', [
			'postname' => 'updated postname test'
		]);
	}
	public function testPostDelete()
	{
		$post = new Post();
		$post->postname = 'updated postname test';
		$post->description = 'description test';
		$post->password = 'password for test';
		$post->status = 'test status';
		$post->save();

		$this->assertDatabaseHas('posts', $post->toArray());

		$this->delete("/posts/{$post->id}")
			 ->assertStatus(302)
			 ->assertSessionHas('status');
		$this->assertDatabaseMissing('posts', [
			'postname' => 'updated postname test'
		]);
	}
}
