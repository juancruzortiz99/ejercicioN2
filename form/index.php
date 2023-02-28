<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/prueba/access.inc.php';

if (!userIsLoggedIn()) {
    include '../login.html.php';
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

$result = $pdo->query('SELECT id,nombre,descripcion FROM imagen');


foreach ($result as $row) {
    $imagenes[] = array(
        'id' => $row['id'],
        'name' => $row['nombre'],
        'desc' => $row['descripcion']
    );
}

if (isset($_POST['img'])) {

    $sql =  'INSERT INTO imagen SET
    nombre = :nombre';
    $s = $pdo->prepare($sql);
    $s->bindValue(':nombre', $_POST['img']);
    $s->execute();

    $id = $pdo->lastInsertId();

    include "../imagenes.html.php";
    exit();
}

include "form.html";
