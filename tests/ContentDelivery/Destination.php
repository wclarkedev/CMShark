<?php
require 'Functions.php';
// Data taken from functions (that take the data from db)
?>
<html>
    <head></head>
    <body class="page:TestingContent">
        <div class="page-header"></div>
        <div class="page-body">
            <div style="display:flex;
            flex-direction:column; align-items:center; justify-content:center;">
                <div class="item">
                    <span><?php echo "Link ID: ".getLinkContent('linkId');?></span><br>
                    <span><?php echo "Link title: ".getLinkContent('linkTitle');?></span><br>
                    <span><?php echo "Link description: ".getLinkContent('linkDescription');?></span><br>
                    <span>Link: <a href="<?php echo getLinkContent('link');?>"><?php echo getLinkContent('link');?></a></span><br>
                </div>
            </div>
        </div>
        <div class="page-footer"></div>
    </body>
</html>