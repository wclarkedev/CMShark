<?php
require 'db.php';
// Data enters db
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $linkTitle = $_POST['Link-title'];
    $linkDesc = $_POST['Link-description'];
    $linkHref = $_POST['Link'];
    $id = $_POST['Link-id'];

    // Check data is not empty 
    if (empty(trim($linkTitle)) && empty(trim($linkDesc)) && empty(trim($linkHref))){
        exit("One or more form inputs were empty");
    } else {
        $connection = new mysqli($host,$user,$password,$db);
        $query = "INSERT INTO tests (linkID,linkTitle,linkDescription,link) VALUES (".$id.",".$linkTitle.",".$linkDesc.",".$linkHref.")";
        if ($connection->query($query) == 'TRUE') echo "records created";
        else echo "creation failed:".$connection->error;
        $connection->close();
    }
}
// works- INSERT INTO tests (linkTitle,linkDescription,link) VALUES ("test","test","test.com");
?>
<html>
    <body>
        <form method="POST" style="display:flex;flex-direction:column;font-family:sans-serif">
        <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;margin-top:20px">
                <label>Link ID:</label>
                <input name="Link-id">
            </div>
            <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;margin-top:20px">
                <label>Link Title:</label>
                <input name="Link-title">
            </div>
            <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;margin-top:20px">
                <label>Link Description:</label>
                <input name="Link-description">
            </div>
            <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;margin-top:20px">
                <label>Link:</label>
                <input name="Link">
            </div>
            <input type="submit" style="width:200px; margin:auto; display:flex; margin-top:20px;">
        </form>
    </body>
</html>