<?php
require 'db.php';
// Data taken from db
function getLinkContent($type){
    $con = dbConnect();
    switch($type) {
        case "linkId":
            break;
        case "linkTitle":
            break;
        case "linkDescription":
            break;
        case "link":
            break;
        default:
            exit;
    }
}
