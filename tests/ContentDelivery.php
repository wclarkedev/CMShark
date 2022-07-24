<?php
require 'db.php';
// Data enters db
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