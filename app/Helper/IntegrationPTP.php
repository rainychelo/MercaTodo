<?php

namespace App\Helper;

use Dnetix\Redirection\PlacetoPay;

class IntegrationPTP
{
 public Static function createConnectionPTP():PlacetoPay
 {
     $login= config('app.login');
     $trankey= config('app.trankey');
     $baseurl= config('app.baseurl');

     $placetopay = new PlacetoPay([
         'login' => $login,
         'tranKey' => $trankey,
         'baseUrl' => $baseurl,
         'timeout' => 10,
     ]);

     return $placetopay;
 }
}
