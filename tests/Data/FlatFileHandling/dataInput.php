<?php
// data gathered and put into data.yml
require '/vendor/autoload.php';
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
    <form method="POST">
        <input type="text" name="testInput-loginUsername">
        <input type="password" name="testInput-loginPassword">
    </form>
    <?php
});
// Different data types tests
$router->get('/form/different_datatypes',function (){

});

// Run router
$router->run();