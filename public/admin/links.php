<!DOCTYPE html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Admin</title>
        <link href="../../src/css/framework.css" rel="stylesheet">
    </head>
    <body>
<?php
if($_SERVER['REQUEST_METHOD']=='GET'):
    $action = $_GET['action'];
    switch ($action){
        case "createNew":
            break;
        case "edit":
            break;
        case "delete":
            break;
    }
endif;
?>
    </body>
</html>