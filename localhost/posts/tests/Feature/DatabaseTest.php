<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{

	use		RefreshDatabase;

	public function testDatabaseInsertion()
	{
		$post = new Post();
		$post->postname = 'postname for test';
		$post->description = 'description for test';
		$post->status = 'status for test';
		$post->password = 'password for test';
		$post->save();

		$this->assertDatabaseHas('posts', [
			'postname' => 'postname for test',
			'description' => 'description for test',
			'status' => 'status for test',
			'password' => 'password for test'
		]);
	}
}
