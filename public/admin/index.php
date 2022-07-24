<?php
require '../../src/functions.php';
//require '../../config/config.php';
//redirectForNotLoggedIn();
?>
<!doctype html><html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <link href="../../src/css/framework.css" rel="stylesheet">
    </head>
    <body class="shark-admin">
        <nav class="shark-nav-bar">
            <ul>
                <li><a href="#" class="nav-link nav-active-item">Home</a></li>
                <li><a href="page-settings.php?ref=dash" class="nav-link">Page Settings</a></li>
                <li><a href="admin-settings.php?ref=dash" class="nav-link">Admin Settings</a></li>
            </ul>
            <a href="../logout.php" class="logout-button button">Logout</a>
        </nav>
        <main class="shark-page-body">
            <form method="POST" class="shark-form">
                
            </form>
        </main>
    </body>
</html>