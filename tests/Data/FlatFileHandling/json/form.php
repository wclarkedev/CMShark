<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (!empty($_POST['username'])) $username = $_POST['username'];
    if (!empty($_POST['email'])) $email = $_POST['email'];
    $data = array();
    $data['users'] = array();
    $user = ['email'=>$email, 'username'=>$username];
    array_push($data['users'], $user);
    $json = json_encode($data);
    file_put_contents('formData.json', $json);
}
?>
<html>
    <body>
        <form method="POST">
            <input name="username">
            <input name="email">
            <input type="submit">
        </form>
    </body>
</html>