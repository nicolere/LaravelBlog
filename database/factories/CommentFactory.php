<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    $posts  = App\Post::all();
    $users = App\User::pluck('id')->toArray();

    return [
        'post_id'=> $faker->randomElement($posts),
        'parent_id'=> 1,
        'comment_author' => $faker->randomElement($users),
        'comment_content' => $faker->paragraph()
    ];
});
