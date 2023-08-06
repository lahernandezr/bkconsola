<?php

namespace app\models;

use Yii;


/**
 *
 */
class GeneratorCode 
{
    public $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    function generate_string($prefix, $postfix,$strength = 16) {
        $input_length = strlen($this->permitted_chars);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $this->permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $prefix.$random_string.$postfix;
    }
}