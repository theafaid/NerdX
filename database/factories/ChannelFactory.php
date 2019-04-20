<?php

use Faker\Generator as Faker;

$factory->define(\App\Channel::class, function (Faker $faker) {
    $name = $faker->text(10);
    return [
        'name' => $name,
        'slug' => \Str::slug($name),
        'description' => $faker->realText(200),
        'user_id' => function(){
            if(app()->runningUnitTests()){
                return factory('App\User')->create()->id;
          }

            return \App\User::all()->random()->id;
        }
    ];
});
