<!DOCTYPE html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title><?php //echo getMetaTitle();?></title>
        <link href="../src/css/framework.css" rel="stylesheet">
    </head>
    <body class="main-body">
        <section class="header-container"></section>
        <section class="body-container"></section>
        <section class="footer-container">
            <?php
            if (true/*userGiveCredit()*/){
                ?> 
                <section class="footer-credit"></section>
                <?php
            }
            ?>
        </section>
    </body>
</html>