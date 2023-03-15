<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <?php 
            require("funkcje.php");

            print_r($_GET);

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isSet($_GET["utworzCookie"])) {
                    setcookie("nazwa", "wartość", time() + $_GET['czas'], "/");
                }
            }
        ?>

        <a href="index.php">Go back to index</a>
    </body>
</html>