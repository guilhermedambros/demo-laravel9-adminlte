<?php

namespace App\Helpers;

use App\UsuarioEsreg;
use Auth;

class Helpers {

    static function removeSpecialChar($value)
    {
        $value = str_replace(' ', '-', $value); // Replaces all spaces with hyphens.
        $value = str_replace('-', '', $value); // Replaces all spaces with hyphens.
        $value = preg_replace('/[^A-Za-z0-9\-]/', '', $value); // Removes special chars.
        return preg_replace('/-+/', '-', $value); // Replaces multiple hyphens with single one.
    }


    // Exemplo de uso: \App\Helpers\Helpers::formatarCNPJCPF('42104986550278');
    static function formatarCNPJCPF($value)
    {
        $cnpj_cpf = preg_replace("/\D/", '', $value);
        if (strlen($cnpj_cpf) === 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
        } 
        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }

    // https://stackoverflow.com/questions/10152894/php-replacing-special-characters-like-%C3%A0-a-%C3%A8-e
    static function slugify($text, $strict = false)
    {
        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d.]+~u', '-', $text);
    
        // trim
        $text = trim($text, '-');
        setlocale(LC_CTYPE, 'en_GB.utf8');
        // transliterate
        if (function_exists('iconv')) {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }
    
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w.]+~', '', $text);
        if (empty($text)) {
            return 'empty_$';
        }
        if ($strict) {
            $text = str_replace(".", "_", $text);
        }
        return $text;
    }

    // Formato esperado H:m
    static function convertHoursToFloat($time)
    {
        if (!empty($time)) {
            $aux = explode(':', $time);
            $hours = substr($aux[0], 0, 2);
            $minutes = $aux[1] ?? substr($time, 2);
            return $hours + round($minutes / 60, 4);
        }
        return "Ocorreu um erro!";
    }

    // Formato esperado 99.99
    static function convertFloattoHours($time)
    {
        if (!empty($time)) {
            $aux = explode('.', $time);
            $hours = str_pad($aux[0], 2, "0", STR_PAD_LEFT);
            $minutes = str_pad($aux[1] ?? 0, 2, "0", STR_PAD_RIGHT);
            return $hours .':'. str_pad(round(((60 / 100) * $minutes)), 2, "0", STR_PAD_LEFT);
        }
        return "Ocorreu um erro!";
    }
    
   
}