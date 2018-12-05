<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
  return [
    'client_name' => $faker->company,
    'short_name' => $faker->company,
    'address_1' => $faker->streetAddress,
    'address_2' => $faker->secondaryAddress,
    'city' => $faker->city,
    'state' => $faker->stateAbbr,
    'country' => $faker->country,
    'contact' => $faker->name,
    'email' => $faker->email,
    'phone' => $faker->phoneNumber,
    'website' => $faker->domainName,
    'hour_rate' => 100,
    'half_hour_rate' => 65
  ];
});
