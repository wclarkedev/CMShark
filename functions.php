<?php
function redirectForNotLoggedIn(){
    if (!$_SESSION['adminLoggedIn']){
        header("Location: ../login/");
    }
}
function validateEmail($badEmail){
    $email = filter_var($badEmail, FILTER_SANITIZE_EMAIL);
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function validatePassword($password){
    if (empty(trim($password))) return array(false);
    if (strlen($password) <= 8 ) return array(false, 'Your password must contain at least 8 characters.');
    if (!preg_match("#[a-z]+#",$password)) return array(false, 'Your password must contain at least 1 lower-case letter.');
    if (!preg_match("#[A-Z]+#",$password)) return array(false, 'Your password must contain at least 1 upper-case letter.');
    if (!preg_match("#[0-9]+#",$password)) return array(false, 'Your password must contain at least 1 number.');
    if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$password)) return array(false, 'Your password must contain at least 1 special character.');  
    return array(true);
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