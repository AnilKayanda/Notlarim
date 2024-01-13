<?php

session_start();

include "connection.php";

if (isset($_POST['Eposta']) && isset($_POST['Parola'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['Eposta']);
    $pass = validate($_POST['Parola']);

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE Eposta=? AND Parola=?");
        $stmt->bind_param("ss", $uname, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Oturum başlatma
            $_SESSION['Eposta'] = $row['Eposta'];
            $_SESSION['Ad'] = $row['Ad'];
            $_SESSION['ID'] = $row['ID'];

            // Giriş başarılı olduğunda yönlendirme
            header("Location: /projects/ecommerce/home2.php");
            exit();
        } else {
            // Giriş başarısız olduğunda yönlendirme
            session_unset();
            header("Location: /projects/ecommerce/login_error.html");
            exit();
        }
    }
}

// Bu satır gerekli değil, çünkü yukarıda yönlendirme yapılıyor.
// header("Location: /projects/ecommerce/login_error.html");
// exit();
