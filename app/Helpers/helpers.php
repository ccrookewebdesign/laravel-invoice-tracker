<?php

// Globally accessible functions
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Sentry\SentryLaravel\SentryFacade;

function user(): ?App\User{
  return auth()->user();
}

function flash($message, $type, $title = null, $is_modal = true){
  if($type == 's' || $type == 'good'){
    $type = 'success';
  }
  if($type == 'e' || $type == 'err'){
    $type = 'error';
  }

  if(!strlen($title)){
    $title = $type === 'success' ? 'Success!' : 'Oops...';
  }

  $icon = $type; // warning, error, success, info
  Session::put('flash_msg', compact('message', 'type', 'is_modal', 'title', 'icon'));
}


function client_ip(){
  return \Illuminate\Support\Facades\Request::ip();
}

function get_rand(array $list){
  shuffle($list);

  return array_first($list);
}

function get_10_digit_date($date, $allow_null = false){
  if($date === null || $date === ''){
    if($allow_null){
      return null;
    }
    else {
      throw new \Exception('Date expected but not provided e73812');
    }
  }
  else if($date instanceof \Carbon\Carbon){
    return $date->toDateString();
  }
  else if(is_string($date) && strlen($date) >= 10){
    return substr($date, 0, 10);
  }
  else {
    throw new \Exception('Invalid date');
  }
}

/**
 * @param $date
 * @param bool $allow_null
 * @return Carbon|null
 * @throws Exception
 */
function carbon($date, $allow_null = false){
  if($date === null || $date === ''){
    if($allow_null){
      return null;
    }
    else {
      throw new \Exception('Date expected but not provided e73812');
    }
  }
  else if($date instanceof \Carbon\Carbon){
    return (clone $date);
  }
  else if(is_numeric($date)){
    // Assume Unix Timestamp
    return \Carbon\Carbon::createFromTimestamp($date);
  }
  else {
    return \Carbon\Carbon::parse($date);
  }
}

function format_date($date, $format = 'date'){
  if(!($date instanceof Carbon)){
    $date = carbon($date, true);
  }

  if(!($date instanceof Carbon)){
    return null;
  }

  $timezone = 'America/New_York';
  if(user() && strlen(user()->timezone)){
    $timezone = user()->timezone;
  }

  if($format === 'datetime'){
    $format = 'Y-m-d g:ia T';
  }
  else if($format === 'date'){
    $format = 'Y-m-d';
  }

  return $date->setTimezone($timezone)->format($format);
}

// Returns STRING with exactly 2 decimal places
function money($money): string{
  if(!is_numeric($money)){
    throw new \Exception('Invalid money amount');
  }

  return sprintf("%01.2f", $money);
}

function humanize($str){
  $str = str_replace('_', ' ', $str);

  return title_case($str);
}

function create_nested_array($arr, $keys, $nested_name = 'details'){
  if(!isset($arr[$nested_name])){
    $arr[$nested_name] = [];
  }

  if(!is_array($arr[$nested_name])){
    throw new \Exception('Unable to created nested array with key ' . $nested_name);
  }

  foreach($keys as $key){
    if(isset($arr[$key])){
      if(!is_null($arr[$key])){
        $arr[$nested_name][$key] = $arr[$key];
      }
      unset($arr[$key]);
    }
  }
  return $arr;
}


/**
 * Current domain name WITHOUT the subdomain
 */
function get_top_level_domain(){
  $hostname = app()->runningInConsole() ? parse_url(config('app.url'), PHP_URL_HOST) : app("request")->getHost();

  if(filter_var($hostname, FILTER_VALIDATE_IP)){
    return $hostname;
  }

  if(count($parts = explode('.', $hostname)) === 1){
    return $hostname;
  }

  $hostname = $parts[count($parts) - 2] .'.' . $parts[count($parts) - 1];

  return $hostname;
}

/**
 * Domain used for setting cookie scope
 */
function get_cookie_domain(){
  $tld = get_top_level_domain();
  if(count(explode('.', $tld)) === 2){
    return '.' . $tld;
  }

  return $tld;
}


/**
 * Normalize the URLs that are in the DB
 * @param string $url
 * @return string
 */
function url_normalize(string $url = null): string{
  if(strlen($url) < 1 || $url === null){
    return "";
  }
  if($ret = parse_url($url)){
    if(!isset($ret["scheme"])){
      return strtolower("http://{$url}");
    }
    else {
      return strtolower($url);
    }
  }
}


