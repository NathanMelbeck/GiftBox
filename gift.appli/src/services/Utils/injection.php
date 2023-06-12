<?php
namespace gift\app\services\Utils;
class injection {
    function injectionString($string){
        return filter_var($string);
    }

    function injectionMail($mail){
        return filter_var($mail, FILTER_VALIDATE_EMAIL);
    }
}