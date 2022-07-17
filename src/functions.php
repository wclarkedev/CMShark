<?php
function redirectForNotLoggedIn(){
    if (!$_SESSION['adminLoggedIn']){
        header("Location: ../login/");
    }
}
function validateEmail($email){}
function validatePassword($password){}
function validateUsername($username){}
function validateInput($input,$type){}