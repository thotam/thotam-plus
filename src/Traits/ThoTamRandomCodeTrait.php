<?php

namespace Thotam\ThotamPlus\Traits;

trait ThoTamRandomCodeTrait {
    //Tạo mã ngẫu nhiên
    public function get_random_code($length = 6)
    {
        $token = "";

        $codeAlphabet = "ABCDEFGHJKLMNOPQRSTUVWXYZ";
        $token .= $codeAlphabet[random_int(0, strlen($codeAlphabet)-1)];

        $codeNumber = "0123456789";
        $token .= $codeNumber[random_int(0, strlen($codeNumber)-1)];

        $codeAlll = "1A2B3C4D5E6F7G8H91J2K3L4M5N6P7Q8R9S1T2U3V4W5X6Y7Z";
        $max = strlen($codeAlll); // edited
        for ($i=0; $i < $length - 2; $i++) {
            $token .= $codeAlll[random_int(0, $max-1)];
        }

        return $token;
    }
}
