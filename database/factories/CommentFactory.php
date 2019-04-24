<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    $posts  = App\Post::all();

    return [
        'post_id'=> $faker->randomElement($posts),
        'comment_author' => $faker->name,
        'comment_date' => $faker->date("d M Y H:i", mt_rand(1, time())),
        'comment_content' => $faker->paragraph()
    ];
});
