<?php

namespace App\Helpers;

class GeneralFunction {
    public static function decode_image($code_base64){
        $hasil  =   base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $code_base64));
      return $hasil;  
  }
}

