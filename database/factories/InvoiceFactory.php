<?php

use Faker\Generator as Faker;

$factory->define(App\Invoice::class, function (Faker $faker) {
  return [
    'client_id' => function() {
      return factory('App\Client')->create()->id;
    },
    'title' => $faker->monthName . ' ' . $faker->year($max = 'now'),
    'due_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'sent_date' => null,
    'paid' => false,
    'paid_date' => null,
    'notes' => $faker->paragraph
  ];
});
