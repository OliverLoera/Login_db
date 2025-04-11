<?php
    include("config.php");
    session_start();

    echo '<pre>';
    print_r($_POST); // Diagnóstico: muestra lo que se está recibiendo
    echo '</pre>';

    if (isset($_POST['register'])) {

        $username = $_POST['username'] ?? '';
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        if (empty($username) || empty($email) || empty($password)) {
            echo '<p style="color:red;">Por favor, llena todos los campos.</p>';
            exit;
        }

        $query = $connection->prepare("SELECT * FROM usuarios WHERE EMAIL = :email");
        $query->bindParam(":email", $email, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            echo '<p style="color:red;">El correo ya existe!</p>';
        } else {
            $query = $connection->prepare("INSERT INTO usuarios (USERNAME, PASSWORD, EMAIL) VALUES (:username, :password_hash, :email)");
            $query->bindParam(":username", $username, PDO::PARAM_STR);
            $query->bindParam(":password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam(":email", $email, PDO::PARAM_STR);
            $result = $query->execute();

            if ($result) {
                echo '<p style="color:green;">¡Se registró correctamente!</p>';
            } else {
                echo '<p style="color:red;">¡Error al registrar!</p>';
            }
        }
    }
?>
