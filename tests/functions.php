<?php

function create($class, $attributes = [], $times = null){
  return factory($class, $times)->create($attributes);
}

function make($class, $attributes = [], $times = null){
  return factory($class, $times)->make($attributes);
}

function createAndLoginUser(){
  $user = factory(App\User::class)->create();
  \Auth::login($user);
  return $user;
}

function createAndLoginAffiliate(){
  $user = factory(App\User::class)->states('affiliate')->create();
  \Auth::login($user);
  return $user;
}