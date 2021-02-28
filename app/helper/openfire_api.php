<?php

if(!function_exists("createXml")){
  function createXml($jsonObject){
    $xml_string = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
    $xml_string .= createXmlDataString($jsonObject);
    return $xml_string;
  }
}

if(!function_exists("createXmlDataString")){
  function createXmlDataString($jsonObject){
    $xml_string = '';
    foreach($jsonObject as $key=>$value){
      $xml_string .= "<".strval($key).">";
      if(is_object($value) || is_array($value)){
        $xml_string .= createXmlDataString($value);
      }else{
        $xml_string .= strval($value);
      }
      $xml_string .= "</".strval($key).">";
    }
    return $xml_string;
  }
}
