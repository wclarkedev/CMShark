<?php
require '../../src/functions.php';
//require '../../config/config.php';
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
                <section class="form-section" id="header-section">
                    <h3>Page Header</h3>

                    <label>Display Name</label>
                    <input class="text-input" type="text" name="userDisplayName" placeholder="John Doe" maxlength="45">

                    <label>Pronouns</label>
                    <input class="text-input" type="text" name="userPronouns" placeholder="He/Him" maxlength="45">
                    <span class="disclaimer">Read more about pronouns 
                        <a href="https://www.edi.nih.gov/blog/communities/what-are-gender-pronouns-why-do-they-matter" target="_blank">here</a>.
                    </span>

                    <label>Location</label>
                    <input class="text-input" type="text" name="userLocation" placeholder="Britain" maxlength="55">

                    <label>Picture</label>
                    <label class="file-upload">
                        Upload Image
                        <input type="file" value="Upload-Image" name="userProfilePicture"> 
                    </label><!-- https://www.w3schools.com/php/php_file_upload.asp -->

                    <input type="submit" class="submit-button" value="Save">
                </section>
                <section class="form-section" id="socialIcons-section"></section>
                <section class="form-section" id="pageAppearance-section">
                    <h3>Page Appearance</h3>

                    <label>Theme</label>
                    <div class="radio-row">
                        <label id="dark-theme">
                            <input type="radio" value="Dark" id="dark-theme-input" name="userPageTheme">
                            <span>Dark</span>
                        </label>
                        <label id="light-theme">
                            <input type="radio" value="Light" id="light-theme-input" name="userPageTheme">
                            <span>Light</span>
                        </label>
                    </div>

                    <label>Font</label>
                    <div class="radio-row">
                        <label>
                            <input type="radio" value="Sans-Serif" name="userPageFont">
                            <span>Sans-Serif</span>
                        </label>
                        <label>
                            <input type="radio" value="Monospace" name="userPageFont">
                            <span>Monospace</span>
                        </label>
                    </div>

                    <input type="submit" class="submit-button" value="Save">
                </section>
                <section class="form-section" id="links-section">
                    <h3>Links</h3>
                    <div class="links-row">
                        <label>
                            <a href="admin/links.php?action=createNew" class="add-new-link">Add new link</a>
                        </label>
                        
                    </div>
                    <div class="links-container"></div>
                </section>
            </form>
        </div>
    </body>
</html>