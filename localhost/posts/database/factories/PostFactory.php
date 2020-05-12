<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'postname' => $faker->realText(20),
        'description' => $faker->text(),
        'status' => $faker->boolean,
        'password' => password_hash($faker->text(), PASSWORD_DEFAULT),
        'updated_at' => $faker->dateTimeBetween('-3 years')
    ];
});
