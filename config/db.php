<?php
define('DB_HOST','');
define('DB_USER','');
define('DB_PASSWORD','');
define('DB_NAME','');

function dbConnect(){
    $host = DB_HOST;
    $user = DB_USER;
    $password = DB_PASSWORD;
    $name = DB_NAME;
    try {
        $connection = new PDO("mysql:host=$host;dbname=$name",$user,$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return 'Connected';
    } catch (PDOException $e) {
        return 'Connection failed - '.$e->getMessage();
    }
}
function dbDisconnect($connection){
    return $connection = null;
}
function dbQuery(){}