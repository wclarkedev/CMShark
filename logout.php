<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) {
    session_destroy();
    header("Location: /");
} else {
    header("Location: /");
}