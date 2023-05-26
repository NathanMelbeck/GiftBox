<?php

session_start();

$token = CsrfService::generate();

echo '<input type="hidden" name="csrf_token" value="' . $token . '">';

if (isset($_POST['csrf_token'])) {
    $submittedToken = $_POST['csrf_token'];
    try {
        CsrfService::check($submittedToken);
    } catch (\Exception $e) {
        echo 'Erreur CSRF : ' . $e->getMessage();
    }
}
