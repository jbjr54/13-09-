<?php
session_start();
include("./db/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        header("Location: ./login.php?error=EMPTYFIELDS");
        exit();
    }

    $sql = "SELECT * FROM viadaspatinhas.tb_login WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("ERRO NA PREPARAÇÃO DA CONSULTA: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['PASSWORD'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $row['ID'];
            $_SESSION['username'] = $row['USERNAME'];
            $_SESSION['email'] = $row['EMAIL']; // Certifique-se de que o e-mail está disponível
            $_SESSION['online'] = true; // Defina o status de online aqui (geralmente gerenciado dinamicamente)
            header("Location: ./priv.php");
        } else {
            header("Location: ./login.php?error=WRONGPASSWORD");
        }
    } else {
        header("Location: ./login.php?error=NOUSER");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ./login.php");
    exit();
}
?>