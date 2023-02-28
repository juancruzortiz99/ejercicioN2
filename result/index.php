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

$result = $pdo->query('SELECT id, nombre, descripcion, COUNT(*) from imagen inner join votacion ON votacion.idfoto = imagen.id
        GROUP by votacion.idfoto  
        ORDER BY `COUNT(*)` desc');


foreach ($result as $row) {
    $imagenes[] = array(
        'id' => $row['id'],
        'name' => $row['nombre'],
        'desc' => $row['descripcion'],
        'votos' => $row['COUNT(*)']
        
    );
}




include "results.html.php";
