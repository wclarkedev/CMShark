<?php
function redirectForNotLoggedIn(){
    if (!$_SESSION['adminLoggedIn']){
        header("Location: ../login/");
    }
}