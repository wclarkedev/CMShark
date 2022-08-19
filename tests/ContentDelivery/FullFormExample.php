<?php
require "db.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = "";
    if(empty(trim($_POST["title"])) && empty(trim($_POST["description"]))&& empty(trim($_POST["href"]))) $error = "One or more fields are empty";
    else {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $href = $_POST["href"];
        $connection = new mysqli($host,$user,$password,$db);
        $query = "INSERT INTO tests(linkTitle,linkDescription,link) VALUES (".$title.",".$description.",".$href.")";
        if($connection->query($query) == true) echo "Records created";
        else echo "Record creation failed: ".$connection->error;
        $connection->close();
    }
}
?>
<!DOCTYPE html><html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
    </head>
    <style>
        html {font-family:sans-serif;}
        form {
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }
        form div {
            display:flex;
            flex-direction:column;
        }
    </style>
    <body>
        <form method="POST">
            <h3>Create new link</h3>
            <label class="php-error"><?php echo "error:". $error;?></label>
            <div>
                <label>Title</label>
                <input type="text" name="title">
            </div>
            <div>
                <label>Description:</label>
                <input type="text" name="description">
            </div>
            <div>
                <label>Hyperlink: <code>including https://</code></label>
                <input type="text" name="href">
            </div>
            <input type="submit">
        </form>
    </body>
</html>