<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Gnello\OpenFireRestAPI\Client;

trait OpenFire{
  public static function getToken(){
    return "7SvLNWt8Oxp4HXgI";
  }

  public static function getDomain(){
    return "deallegacy.com";
  }

  public static function getSecureDomain(){
    return "http://".OpenFire::getDomain();
  }

  public static function getClient(){
    $client = new Client([
      'client' => [
          'secretKey' => OpenFire::getToken(),
          'scheme' => 'http',
          'basePath' => '/plugins/restapi/v1/',
          'host' => OpenFire::getDomain(),
          'port' => '9090',
      ],
      'guzzle'    => [
           //put here any options for Guzzle
      ]
    ]);
    return $client;
  }

  public static function getApiUrl(){
    return OpenFire::getSecureDomain().":9090/plugins/restapi/v1/";
  }

  public static function getUser($username){
    $response = OpenFire::getClient()->getUserModel()->retrieveUser($username);
    return $response;
  }

  public static function getUserCreateUrl($username){
    return OpenFire::getSecureDomain().":9091/plugins/restapi/v1/users/";
  }

  public static function apiGet($url){
    try{
      // $response = Http::withHeaders([
      //     "Authorization: ".OpenFire::getToken(),
      // ])->get($url);
      $response = OpenFire::getClient()->getUserModel()->retrieveUser('user2');
      echo "<pre>";
      print_r($response->getBody()->getContents());
      // print_r("------------------------------------------------------------------");
      print_r(get_class_methods($response->getBody()));

    }catch(\Exception $e){
      print_r($e->getMessage());
    }
  }

  public static function apiPost($url){
    try{

    }catch(\Exception $e){

    }
  }
}
