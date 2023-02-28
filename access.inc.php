<?php

function userIsLoggedIn()
{
    if (isset($_POST['action']) and $_POST['action'] == 'login') {
        if (
            !isset($_POST['email']) or $_POST['email'] == '' or
            !isset($_POST['password']) or $_POST['password'] == ''
        ) {
            $GLOBALS['loginError'] = 'Llena ambas casillas.';
            return FALSE;
        }
        $password = $_POST['password'];
        if (dbContainsUsuario($_POST['email'], $password)) {
            session_start();
            $_SESSION['loggedIn'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $password;
            return TRUE;
        } else {
            session_start();
            unset($_SESSION['loggedIn']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            $GLOBALS['loginError'] =
                'Contraseña o correo incorrecto.';
            return FALSE;
        }
    }

    if (isset($_POST['action']) and $_POST['action'] == 'logout') {
        session_start();
        unset($_SESSION['loggedIn']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: ' . $_POST['goto']);
        exit();
    }

    if (isset($_POST['action']) and $_POST['action'] == 'register') {
        $password = $_POST['password'];
        $email = $_POST['email'];
        $name = $_POST['name'];

        try {

            $dbuser = "root";
            $contraseña = "";
            $pdo = new PDO('mysql:host=localhost;dbname=ejercicio', $dbuser, $contraseña);
        } catch (PDOException $e) {
            echo "No se ha cargado la base de Datos.";
            exit();
        }

        try {
            
            $sql =  'INSERT INTO usuario SET
            nombre = :nombre, email = :email, password = :password';
            $s = $pdo->prepare($sql);
            $s->bindValue(':nombre', $name);
            $s->bindValue(':email', $email);
            $s->bindValue(':password', $password);
            $s->execute();
            session_start();
            $_SESSION['loggedIn'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $password;
            return TRUE;
            $id = $pdo->lastInsertId();
        } catch (PDOException $e) {
            echo 'No se pudo ingresar el usuario';
            exit();
        }


        header("Location: .");
        exit();
    }

    session_start();
    if (isset($_SESSION['loggedIn'])) {
        return dbContainsUsuario(
            $_SESSION['email'],
            $_SESSION['password']
        );
    }
}


function dbContainsUsuario($email, $password)
{

    try {

        $dbuser = "root";
        $contraseña = "";
        $pdo = new PDO('mysql:host=localhost;dbname=ejercicio', $dbuser, $contraseña);
    } catch (PDOException $e) {
        echo "No se ha cargado la base de Datos.";
        exit();
    }

    try {
        $sql = 'SELECT COUNT(*) FROM usuario
 WHERE email = :email AND password = :password';
        $s = $pdo->prepare($sql);
        $s->bindValue(':email', $email);
        $s->bindValue(':password', $password);
        $s->execute();
    } catch (PDOException $e) {
        echo 'No se encuentra el usuario.';
        exit();
    }
    $row = $s->fetch();
    if ($row[0] > 0) {
        return TRUE;
    } else {
        return FALSE;
    }
}
