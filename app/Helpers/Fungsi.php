<?php
namespace App\Helpers;
 
class Fungsi {

    public static function format_rupiah($data) {
        return "Rp." . number_format($data, 0, "", ".");
    }

}