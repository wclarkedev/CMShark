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
function getImages ($type,$link=null) {
    if (!isset($type) && empty(trim($type))) exit();
    switch ($type) {
        case "pfp":
            return './uploads/pfp.webp';
        break;
        case "favicon":
            return './uploads/fav.ico';
        break;
        case "link_icon":
            if (!isset($link) && empty(trim($link))) exit();
            $default = './images/default.png';
            $domain = explode('/', $link);
            $domain = $domain[2]; //assuming that the url starts with http:// or https://
            return $default;

        break;
        case "default":
            $image = [];
            $image['pfp'] = './uploads/default/logo.png'; // cmshark link for default pfp
            $image['favicon'] = './uploads/default/logo.png'; // cmshark link for default favicon
            return $image;
        break;
    }
}
function ga() {
    $file = './json/config.json';
    if (isset($file->{'ga'}) && !empty(trim($file->{'ga'}))) return true;
    return false;
}