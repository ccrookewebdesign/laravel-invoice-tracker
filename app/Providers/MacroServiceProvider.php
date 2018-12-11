<?php

namespace App\Providers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Route;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use PHPUnit\Framework\Assert as PHPUnit;

class MacroServiceProvider extends ServiceProvider {

  public function boot(){
    //
  }

  public function register(){
    $this->response_macros();
    $this->route_macros();
    $this->collection_macros();

    if(app()->runningUnitTests()){
      $this->testing_suite_macros();
    }

  }

  protected function collection_macros(){
    Collection::macro('sumMoney', function($callback){
      return money($this->sum($callback));
    });
  }

  protected function response_macros(){
    $flash = function($message, $title = null, $is_modal = true){
      flash($message, 'success', $title, $is_modal);

      return $this;
    };

    $flashError = function($message, $title = null, $is_modal = true){
      flash($message, 'error', $title, $is_modal);

      return $this;
    };

    RedirectResponse::macro('flash', $flash);
    RedirectResponse::macro('flashError', $flashError);
    \Illuminate\Http\Response::macro('flash', $flash);
    \Illuminate\Http\Response::macro('flashError', $flashError);
  }

  protected function route_macros(){
    Route::macro('category', function($value){
      return $this->category = $value;
    });

    Route::macro('title', function($value){
      return $this->title = $value;
    });
  }

  protected function testing_suite_macros(){
    $assertNoException = function(){
      $exception = $this->headers->get('x-laravel-exception');
      if($exception !== null){
        PHPUnit::fail('Laravel exception: ' . $this->headers->get('x-laravel-exception') .
          ' : ' . $this->headers->get('x-laravel-exception-msg') .
          ' : ' . $this->headers->get('x-laravel-exception-line')
        );
      }
      else if($this->getStatusCode() === 422){
        PHPUnit::fail('HTTP 422: ' . $this->getContent());
      }
      else if($this->getStatusCode() >= 500){
        PHPUnit::fail('HTTP ' . $this->getStatusCode() . ': ' . $this->getContent());
      }

      return $this;
    };

    \Illuminate\Foundation\Testing\TestResponse::macro('assertNoException', $assertNoException);
    \Illuminate\Foundation\Testing\TestResponse::macro('assertNoExceptions', $assertNoException);

    $assertSeeException = function($exception_name = null){
      $actual = $this->headers->get('x-laravel-exception');
      if($exception_name === null){
        PHPUnit::assertTrue(strlen($actual) > 0, "Expected to see an exception but didn't");
      }
      else {
        PHPUnit::assertSame($exception_name, $actual, "Did not see expected exception: " . $exception_name . '. Instead saw ' . $actual);
      }

      return $this;
    };

    \Illuminate\Foundation\Testing\TestResponse::macro('assertSeeException', $assertSeeException);
  }

}
