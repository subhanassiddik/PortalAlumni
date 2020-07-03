<?php

use Faker\Generator as Faker;

$factory->define(App\Vacancy::class, function (Faker $faker,  $attrib) {
    return [
        'title' => $faker->jobTitle,
        'slug' => $faker->slug,
        'description' => $faker->text(500),
        'vacancyable_id' => '1',
        'vacancyable_type' => 'App\Admin',
        'created_at'=>$faker->dateTime,
    ];
});
