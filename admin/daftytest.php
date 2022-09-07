<?php
require_once "../vendor/autoload.php";
//new HotReloader\HotReloader('//localhost/admin/daftytest.php');
use eftec\bladeone\BladeOne;
$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new BladeOne ( $views , $cache , BladeOne::MODE_AUTO); 
?>
<!DOCTYPE html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="/tailwind.config.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
        <title>Admin | CMShark</title>
        <meta name="title" content="Admin">
    </head>
    <body class="bg-backgroundColor w-full h-full">
        <div class="flex">
            <?php echo $blade->run("nav"); ?>
            <main class="p-4 text-gray-200">
                Page content
            </main>
        </div>
    </body>
</html>
