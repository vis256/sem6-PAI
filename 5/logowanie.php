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

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isSet($_POST["zaloguj"])) {
            $formValues = $_POST;

            $login = test_input($formValues['login']);
            $haslo = test_input($formValues['haslo']);
            
            [$zalogowany, $zalogowanyImie] = getUser($login, $haslo);

            $_SESSION['zalogowany'] = $zalogowany;
            $_SESSION['zalogowanyImie'] = $zalogowanyImie;

            if ($zalogowany === 1) {
                // successful login
                header("Location: user.php");

            } else {
                // unsuccessful login
                header("Location: index.php");

            }
        }
    ?>

    <h1>Sprawdzanie danych logowania...</h1>
</body>
</html>