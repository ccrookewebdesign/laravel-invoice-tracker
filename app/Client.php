<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Validator;

class Client extends Model {
  
  protected $guarded = [];

  static public function validator(Validator $v, int $clientId = 0): Validator {
    $id = $clientId ? ',' . $clientId  : '';

    $v->addRules([ 
      'client_name' => 'required|min:5|unique:clients,client_name'.$id,
      'short_name' => 'required|min:2|unique:clients,short_name'.$id,
      'address_1' => 'nullable',
      'address_2' => 'nullable',
      'city' => 'nullable',
      'state' => 'nullable',
      'postal_code' => 'nullable',
      'country' => 'nullable',
      'contact' => 'required|min:5',
      'email' => 'required|email',
      'phone' => 'required|min:10',
      'website' => 'required|min:7',
      'hour_rate' => 'required|numeric',
      'half_hour_rate' => 'required|numeric'
    ]);

    /* $v->sometimes('traffic_source_other', 'required', function($input) {
      return $input->traffic_source === 'Other';
    }); */

    /* $v->setCustomMessages([
      'about_affiliate.required'  => 'Please tell us more about your website or business.',
      'about_affiliate.min'       => 'Please tell us more about your website or business.',
      'traffic_source_other'      => 'Please specify the other traffic source'
    ]); */

    return $v;
  }  

}
