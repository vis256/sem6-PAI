<?php session_start(); ?>

<a href="form06_post.php">Idź do formularza dodawania danych</a>
<br>
<h1>Dane:</h1>
<?php
    $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
    if (!$link) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if (isSet($_SESSION['error'])) {
        if ($_SESSION['error'] === true) {
            echo "Nastąpił błąd przy dodawaniu <br>";
        } else {
            echo "Dodano pracownika <br>";
        }

        unset($_SESSION['error']);
    }

    $sql = "SELECT * FROM pracownicy";
    $result = $link->query($sql);
    foreach ($result as $v) {
        echo $v["ID_PRAC"]." ".$v["NAZWISKO"]."<br/>";
    }
?>