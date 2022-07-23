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
        <nav id="sidebar" class="nav">
            <ul class="nav-list">
                <li class="list-item"><a href="index.php" class="list-link">Home</a></li>
                <li class="list-item"><a href="settings.php" class="list-link">Settings</a></li>

                <li class="list-btn"><a href="../login/logout.php" class="logout-button">Logout</a></li>
            </ul>
        </nav>
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
                <!--Removed 
            Social buttons 
            Theme/appearance-->
                
            
            
            
                <!--<section class="form-section" id="links-section">
                    <h3>Links</h3>
                    <div class="links-row">
                        <label>
                            <a href="admin/links.php?action=createNew" class="add-new-link">Add new link</a>
                        </label>
                    </div>
                    <div class="links-container">
                        <div class="link-container" id="*link-type*">
                            <details>
                                <summary>test</summary>
                                testestest
                            </details>
                        </div>
                    </div>
                </section>-->
            </form>
        </div>
    </body>
</html>