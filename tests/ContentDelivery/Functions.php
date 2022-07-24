<?php
require 'db.php';
// Data taken from db
function getLinkContent($type){
    //$con = dbConnect();
    switch($type) {
        case "linkId":
            return 'h1';
            break;
        case "linkTitle":
            return 'h1';
            break;
        case "linkDescription":
            return 'h1';
            break;
        case "link":
            return 'google.com';
            break;
        default:
            exit;
    }
}
