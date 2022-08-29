<!-- <html>
<body>

<?php echo $_GET["social"]; ?><br>

</body>
</html> -->
<?php

$social = filter_input(INPUT_POST, 'social', FILTER_SANITIZE_STRING);

?>

<?php if ($social) : ?>
    <p>You selected <span style="social:<?php echo $social ?>"><?php echo $social ?></span></p>
    <p><a href="index.html">Back to the form</a></p>
<?php else : ?>
    <p>You did not select any social</p>
<?php endif ?>