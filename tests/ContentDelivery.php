<?php
require 'db.php';
// Data enters db
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $linkTitle = $_POST['Link-title'];
    $linkDesc = $_POST['Link-description'];
    $linkHref = $_POST['Link'];

    // Check data is not empty 
    if (empty(trim($linkTitle)) && empty(trim($linkDesc)) && empty(trim($linkHref))){
        exit("One or more form inputs were empty");
    } else {
        $connection = dbConnect();
    }
}
?>
<html>
    <body>
        <form method="POST" style="display:flex;flex-direction:column;">
            <div style="display:flex;flex-direction:column;align-items:center;justify-content:center">
                <label>Link Title:</label>
                <input name="Link-title">
            </div>
            <div style="display:flex;flex-direction:column;align-items:center;justify-content:center">
                <label>Link Description:</label>
                <input name="Link-description">
            </div>
            <div style="display:flex;flex-direction:column;align-items:center;justify-content:center">
                <label>Link:</label>
                <input name="Link">
            </div>
            <input type="submit">
        </form>
    </body>
</html>