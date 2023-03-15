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

        echo "<h1>Nasz system</h1>";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isSet($_POST["wyloguj"])) {
                echo "Wylogowano";
                $_SESSION['zalogowany'] = 0;
            }
            else if (isSet($_POST["upload"])) {
                $currentDir = getcwd();
                $uploadDirectory = "/zdjecia/";
                $fileName = $_FILES['myfile']['name'];
                $fileSize = $_FILES['myfile']['size'];
                $fileTmpName = $_FILES['myfile']['tmp_name'];
                $fileType = $_FILES['myfile']['type'];

                if ($fileName !== "" and (
                    $fileType === 'image/png' or $fileType === 'image/jpeg' or $fileType === 'image/JPEG' or $fileType === "image/PNG"
                )) {
                    $uploadPath = $currentDir . $uploadDirectory . $fileName;

                    if (move_uploaded_file($fileTmpName, $uploadPath)) {
                        echo "Przesłano zdjęcie";
                    }
                }
            }
        }
?>
    <h3>Formularz logowania</h3>
    <form action="/www/logowanie.php" method="post" id="form1">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login">
        <label for="haslo">Hasło:</label>
        <input type="password" id="haslo" name="haslo">
        <button type="submit" form="form1" name="zaloguj" value="zaloguj">Zaloguj</button> 
    </form>

    <h3>Przejdź do strony użytkownika</h3>
    <a href="user.php">-> user</a>

    <h3>Dodaj ciastko</h3>
    <form action="/www/cookie.php" method="get" id="form2">
        <label for="czas">Czas:</label>
        <input type="number" id="czas" name="czas">
        <button type="submit" form="form2" name="utworzCookie" value="utworzCookie">Utworz</button> 
    </form>

    <h3>
        Status ciastka: 
        <?php
            if (isSet($_COOKIE['nazwa'])) {
                echo "Istnieje";
            } else {
                echo "Nie istnieje";
            }
        ?>
    </h3>
</body>
</html>