<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
        <style>
            body {
                display: flex;
                flex-direction: column;
            }
        </style>
    </head>
    <body>
    <?php
        require_once("funkcje.php");

        if (!isSet($_SESSION['zalogowany']) || $_SESSION['zalogowany'] !== 1) {
            header("Location: index.php");
        }

        $zalogowanyImie = $_SESSION['zalogowanyImie'];

        echo "<h2>Zalogowano jako $zalogowanyImie</h2>";
    ?>

    <h3>Wróc do strony głównej</h3>
    <a href="index.php">-> index</a>

    <h3>Wyloguj</h3>
    <form action="/www/index.php" method="post" id="form1">
        <button type="submit" name="wyloguj" value="wyloguj">Wyloguj</button>
    </form>

    <h3>Zdjęcie</h3>
    <img width="200" height="200" src="zdjecia/myfile.jpg" alt="Wstaw tutaj swoje zdjęcie">

    <h3>Prześlij zdjęcie</h3>
    <form action='index.php' method='POST' enctype='multipart/form-data'>
        <input name="myfile" type="file">
        <button type="submit" name="upload" value="upload">Prześlij</button>
    </form>
    </body>
</html>