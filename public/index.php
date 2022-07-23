<!DOCTYPE html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title><?php //echo getMetaTitle();?></title>
        <link href="../src/css/framework.css" rel="stylesheet">
        <meta property="og:type" content="website">

        <!-- SEO based meta info: -->
    </head>
    <body class="main-body">
        <section class="header-container">
            <!-- Shows the header based on user configuration in settings -->
        </section>
        <section class="body-container">
            <div class="link-collection">
                <!-- Has all link code inside and links should be displayed -->
            </div>
        </section>
        <section class="footer-container">
            <!-- Shows Privacy policy -->
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