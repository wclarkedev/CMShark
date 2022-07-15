<?php
require '../../src/functions.php';
require '../../config/config.php';
//redirectForNotLoggedIn();
?>
<!DOCTYPE html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Admin</title>
        <link href="../../src/css/framework.css" rel="stylesheet">
    </head>
    <body>
        <div class="form-container">
            <form method="POST" class="form">
                <section class="form-section">
                    <label>Display Name</label>
                    <input>
                </section>
                <section class="form-section">
                    <h3>Page Appearance</h3>
                    <label>Theme</label>
                    <input>
                    <label>Primary Colour</label>
                    <input>
                    <label>Font</label>
                    <input>
                </section>
            </form>
        </div>
    </body>
</html>