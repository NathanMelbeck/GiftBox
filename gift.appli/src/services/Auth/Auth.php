<?php
namespace gift\app\services\Auth;

use gift\app\models\user;

class Auth {

    public static function register(string $login, string $pass, string $email): string {
        $user = $_SESSION['utilisateur'] ?? null;

        if ($user->tel != null) {
            $tel = $_SESSION['telephone'];
        } else {
            $tel = null;
        }

        $pass = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 12]);

        $user = new User();
        $user->login = $login;
        $user->pass = $pass;
        $user->email = $email;
        $user->nom = $nom;
        $user->prenom = $prenom;
        $user->tel = $tel;
        $user->save();

        // Utilisez la méthode `authenticate` d'Auth selon votre implémentation

        return "Log";
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