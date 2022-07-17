<!DOCTYPE html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Admin</title>
        <link href="../../src/css/framework.css" rel="stylesheet">
    </head>
    <body class="admin-body">
        <a href="../admin">return</a>
<?php
if($_SERVER['REQUEST_METHOD']=='GET'):
    $action = $_GET['action'];
    switch ($action){
        case "createNew":
            ?>
                <section class="links-action-container">
                    
                </section>
            <?php
            break;
        case "edit":
            ?>
                <section class="links-action-container"></section>
            <?php
            break;
        case "delete":
            ?>
                <section class="links-action-container"></section>
            <?php
            break;
    }
endif;
?>
    </body>
</html>