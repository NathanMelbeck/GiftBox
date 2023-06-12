<?php
namespace gift\app\services\Auth;

use gift\app\models\user;

class Auth {
    /**
     * @throws AuthException
     */
    function authenticate($psswrd, $mail) {
        $user = user::where('email', $mail)->first();
        if (password_verify($psswrd, $user->passwd)) {

            if ($psswrd == $user->passwd) {
                $_SESSION['utilisateur'] = $user;
            } else {
                throw new AuthException();
            }
        }
    }

    function checkPasswordStrength(string $pass, int $minimumLength): bool {
        $length = (strlen($pass) < $minimumLength); // longueur minimale
        $digit = preg_match("#[\d]#", $pass); // au moins un digit
        $lower = preg_match("#[a-z]#", $pass); // au moins une minuscule
        $upper = preg_match("#[A-Z]#", $pass); // au moins une majuscule
        if ($length || !$digit || !$lower || !$upper) return false;
        return true;
    }

    /**
     * @throws mdrException
     */
    function register($email, string $mdp1, string $mdp2, $login = "", $nom = "", $prenom = "", $tel = ""){
        if($mdp1 != $mdp2 || !$this->checkPasswordStrength($mdp1, 8)){
            throw new mdrException();
        } else if (!$this->dejaPresent($email)){
            $user = new user();

            $user->login = $login;
            $user->passwd = password_hash($mdp1, PASSWORD_DEFAULT, ['cost' => 12]);
            $user->email = $email;
            $user->nomUser = $nom;
            $user->prenomUser = $prenom;
            $user->tel = $tel;

            $user->save();
        }
    }

    private function dejaPresent($email) {
        return User::where('email', $email)->exists();
    }



}