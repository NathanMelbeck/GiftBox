<?php
namespace gift\app\services\Auth;

use gift\app\models\user;

class Auth {
    /**
     * @throws AuthException
     */
    function authenticate($psswrd, $mail) {
        $user = user::where('email', $mail)->first();
        //if (password_verify($psswrd, $user->passwd)){
        if($psswrd == $user->passwd){
            $_SESSION['utilisateur'] = $user;
        } else {
            throw new AuthException();
        }
    }

    public static function checkPasswordStrength(string $pass, int $minimumLength): bool
    {

        $length = (strlen($pass) < $minimumLength); // longueur minimale
        $digit = preg_match("#[\d]#", $pass); // au moins un digit
        $lower = preg_match("#[a-z]#", $pass); // au moins une minuscule
        $upper = preg_match("#[A-Z]#", $pass); // au moins une majuscule
        if ($length || !$digit || !$lower || !$upper) return false;
        return true;

    }

}