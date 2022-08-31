<?php
//error_reporting(0); 
    require_once('vendor/autoload.php');
    use eftec\bladeone\BladeOne;
    $views = __DIR__ . '/views';
    $cache = __DIR__ . '/cache';
    $blade = new BladeOne ( $views , $cache , BladeOne::MODE_AUTO); 
?>
<!doctype html><html lang="en">
    <head>
        <!-- Meta -->
        <meta name="charset" content="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="robots" content="index, follow">
        <meta name="copyright" content="cmshark.com">

        <!-- Imports -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="tailwind.config.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" crossorigin="anonymous">
        
        <!-- Configurable Meta -->
        <title><?php 
                if (isset($pageMeta['title']) && !empty(trim($pageMeta['title']))) echo $pageMeta['title'];
                else echo $defaultMeta['title'];
        ?></title>
        <meta name="title" content="<?php 
                if (isset($pageMeta['title']) && !empty(trim($pageMeta['title']))) echo $pageMeta['title'];
                else echo $defaultMeta['title'];
        ?>">
        <meta name="description" content="<?php 
                if (isset($pageMeta['description']) && !empty(trim($pageMeta['description']))) echo $pageMeta['description'];
                else echo $defaultMeta['description'];
        ?>">
        <link rel="icon" type="image/x-icon" href="<?php
                if (isset($favicon) && !empty(trim($favicon))) echo $favicon;
                else echo $defaultImages['favicon'];
        ?>">
        <meta name="url" content="<?php 
                if (isset($pageMeta['url']) && !empty(trim($pageMeta['url']))) echo $pageMeta['url'];
                else echo $defaultMeta['url'];
        ?>">
        <meta name="language" content="<?php 
                if (isset($pageMeta['lang']) && !empty(trim($pageMeta['lang']))) echo $pageMeta['lang'];
                else echo $defaultMeta['lang'];
        ?>">
        <meta name="og:url" content="<?php 
                if (isset($pageMeta['url']) && !empty(trim($pageMeta['url']))) echo $pageMeta['url'];
                else echo $defaultMeta['url'];
        ?>">
        <meta name="owner" content="<?php 
                if (isset($pageMeta['owner']) && !empty(trim($pageMeta['owner']))) echo $pageMeta['owner'];
                else echo $defaultMeta['owner'];
        ?>">
    </head>
<?php
    echo $blade->run("boxed");
?>