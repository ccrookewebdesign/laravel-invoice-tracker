<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
  return [
    'client_id' => function() {
      return factory('App\Client')->create()->id;
    },
    'invoice_id' => function() {
      return factory('App\Invoice')->create()->id;
    },
    'task_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'task_notes' => $faker->paragraph,
    'hours' => $faker->numberBetween($min = 1, $max = 4),
    'task_hour_rate' => 100,
    'task_half_hour_rate' => 65,
    'hours' => $faker->numberBetween($min = 100, $max = 400)
  ];
});
