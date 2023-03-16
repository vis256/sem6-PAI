<?php
    session_start();
    $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
    if (!$link) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if (isset($_POST['id_prac']) &&
        is_numeric($_POST['id_prac']) &&
        is_string($_POST['nazwisko'])) {
            $sql = "INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)";
            $stmt = $link->prepare($sql);
            $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
            try {
                $result = $stmt->execute();

                if (!$result) {
                    printf("Query failed: %s\n", mysqli_error($link));
                    $_SESSION['error'] = true;
                    header("Location: form06_post.php");
                }
                $stmt->close();
                $link->close();
                $_SESSION['error'] = false;
                header("Location: form06_get.php");
            } catch (\Throwable $th) {
                $_SESSION['error'] = true;
                header("Location: form06_post.php");
            }
        } else {
            $_SESSION['error'] = true;
            header("Location: form06_post.php");
        }
?>