<?php

class Utilities {

    public static function genPassword() {
        $alpha = "abcdefghijklmnopqrstuvwxyz";
        $alpha_upper = strtoupper($alpha);
        $numeric = "0123456789";
        $special = ".-+=_,!@$#*%<>[]{}";
        $chars = "";
        $chars .= $alpha;
        $chars .= $alpha_upper;
        $chars .= $numeric;
        $chars .= $special;
        // default [a-zA-Z0-9]{9}
        $chars = $alpha . $alpha_upper . $numeric;
        $length = 9;
        $len = strlen($chars);
        $pw = '';
        for ($i = 0; $i < $length; $i++)
            $pw .= substr($chars, rand(0, $len - 1), 1);

        $pw = str_shuffle($pw);
        return $pw;
    }
    
    public static function getPriceList(){
    return array('0 AND 999' => '0 - 999', '1000 AND 4999' => '1000 - 4999', '5000 AND 10000'=> '5000 - 10000');
}

}
