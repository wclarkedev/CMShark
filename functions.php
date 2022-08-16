<?php
function redirectForNotLoggedIn(){
    if (!$_SESSION['adminLoggedIn']){
        header("Location: ../login/");
    }
}
function validateEmail($badEmail){
    $email = filter_var($badEmail, FILTER_SANITIZE_EMAIL);
    if (empty(trim($email))) return false;
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function validatePassword($password){
    if (empty(trim($password))) return false;
    if (strlen($password) <= 8 ) return 'Password must be at least 8 characters long.';
    if (!preg_match("#[a-z]+#",$password)) return 'Password must contain 1 lower-case letter.';
    if (!preg_match("#[A-Z]+#",$password)) return 'Password must contain 1 upper-case letter.';
    if (!preg_match("#[0-9]+#",$password)) return 'Password must contain 1 number.';
    if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$password)) return 'Password must contain 1 spacial character';   
}
// TODO: Encryption functions 
function emailMatch($email) {
    return preg_match('/^\\S+@\\S+\\.\\S+$/', $email);
}
