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
    <body class="admin-body">
        <div class="form-container">
            <form method="POST" class="form">
                <h2 class="heading">Edit page</h2>
                <section class="form-section">
                    <h3>Page Header</h3>
                    <label>Display Name</label>
                    <input class="text-input" type="text" name="userDisplayName" placeholder="John Doe" maxlength="45">
                    <label>Pronouns</label>
                    <input class="text-input" type="text" name="userPronouns" placeholder="He/Him" maxlength="45">
                    <span class="disclaimer">Read more about pronouns <a href="https://www.edi.nih.gov/blog/communities/what-are-gender-pronouns-why-do-they-matter" target="_blank">here</a>.</span>
                    <label>Picture</label>
                    <input type="file" value="Upload Image" name="userProfilePicture"> <!-- https://www.w3schools.com/php/php_file_upload.asp -->
                    <input type="submit" class="submit-button" value="Save">
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