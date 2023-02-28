<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/prueba/access.inc.php';

if (!userIsLoggedIn()) {
    include 'login.html.php';
    exit();
}

try {
    $dbhost = 'localhost';
    $dbname = 'ejercicio';
    $dbuser = "root";
    $contraseña = "";
    $pdo = new PDO('mysql:host=localhost;dbname=ejercicio', $dbuser, $contraseña);
} catch (PDOException $e) {
    echo "No se ha cargado la base de Datos.";
    exit();
}

$result = $pdo->query('SELECT id, nombre, descripcion from imagen');


foreach ($result as $row) {
    $imagenes[] = array(
        'id' => $row['id'],
        'name' => $row['nombre'],
        'desc' => $row['descripcion'],

    );
}



if (isset($_POST['action']) and $_POST['action'] == 'Delete') {
    try {
        $sql = 'DELETE FROM imagen WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        echo 'Error al borrar la imagen.';
        exit();
    }
    header('Location: .');
    exit();
}



if (isset($_POST['action']) and $_POST['action'] == 'Vote') {
    try {

       

        $sql = 'INSERT INTO votacion SET
        userEmail = :userid, idfoto = :idfoto';
        $s = $pdo->prepare($sql);
        $s->bindValue(':idfoto', $_POST['id']);
        $s->bindValue(':userid', $_SESSION['email']);
        $s->execute();

        $id = $pdo->lastInsertId();
    } catch (PDOException $e) {
        $output = 'Error al votar, este usuario ya ha votado.';
        header("Location: http://localhost/prueba/result/");
        exit();
    }

    header("Location: http://localhost/prueba/result/");
    exit();
}



include "imagenes.html.php";
