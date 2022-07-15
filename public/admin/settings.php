<?php
require '../../src/functions.php';
redirectForNotLoggedIn();
?>
<!DOCTYPE html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Admin - Settings</title>
        <link href="../../src/css/framework.css" rel="stylesheet">
    </head>
    <body>
        <div class="form-container">
            <form method="POST" class="form">
                <section class="form-section">
                    <h3>Page Configurations</h3>
                    <label>Font Awesome Kit</label>
                    <input>
                    <span class="disclaimer">Your kit code is not saved in a global database and will only be used by this page unless specified otherwise.</span>
                </section>
            </form>
        </div>
    </body>
</html>