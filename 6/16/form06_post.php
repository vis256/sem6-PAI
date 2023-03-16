<?php session_start(); ?>
<a href="form06_get.php">Idź do widoku przeglądania danych</a>

<?php
    print<<<KONIEC
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>
    <form action="form06_redirect.php" method="POST">
    id_prac <input type="text" name="id_prac">
    nazwisko <input type="text" name="nazwisko">
    <input type="submit" value="Wstaw">
    <input type="reset" value="Wyczysc">
    </form>
    KONIEC;

    if (isSet($_SESSION['error'])) {
        if ($_SESSION['error'] === true) {
            echo "Nastąpił błąd przy dodawaniu <br>";
        } else {
            echo "Dodano pracownika <br>";
        }

        unset($_SESSION['error']);
    }
?>