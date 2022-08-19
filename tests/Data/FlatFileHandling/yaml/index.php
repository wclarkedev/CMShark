<?php
// data gathered and put into data.yml
require '../../../vendor/autoload.php';
$router = new \Bramus\Router\Router();
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '404, route not found!';
});
$router->get('/',function (){
    echo "hello world";
});
// Login form test
$router->get('/form/login',function (){
    ?>
    <form method="POST" style="">
        <input type="text" name="testInput-loginUsername">
        <input type="password" name="testInput-loginPassword">
        <input type="submit">
    </form>
    <?php
});
// Different data types tests
$router->get('/form/datatypes',function (){

});

// Run router
$router->run();