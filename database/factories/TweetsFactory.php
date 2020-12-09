<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\tweets;
use App\User;

use Faker\Generator as Faker;

use Illuminate\Support\Str;


$factory->define(tweets::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'body'=> $faker->sentence()
    ];
});
