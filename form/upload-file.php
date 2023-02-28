<?php

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

$result = $pdo->query('SELECT id,nombre FROM imagen');


foreach ($result as $row) {
    $imagenes[] = array(
        'id' => $row['id'],
        'name' => $row['nombre'],
    );
}

$file = $_FILES["img"]["name"];

$validator = 1;

$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));

$url_temp = $_FILES["img"]["tmp_name"];

$url_insert = dirname(__FILE__) . "/files";


$url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

if (!file_exists($url_insert)) {
    mkdir($url_insert, 0777, true);
};

$file_size = $_FILES["img"]["size"];
if ($file_size > 1000000) {
    echo "El archivo es muy pesado";
    $validator = 0;
}

if ($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png") {
    echo "Solo se permiten imágenes tipo JPG, JPEG o PNG";
    $validator = 0;
}

if ($validator == 1) {
    if (move_uploaded_file($url_temp, $url_target)) {

        $sql =  'INSERT INTO imagen SET
    nombre = :nombre, descripcion = :descripcion';
        $s = $pdo->prepare($sql);
        $s->bindValue(':nombre', $file);
        $s->bindValue(':descripcion', $_POST['desc']);
        $s->execute();

        $id = $pdo->lastInsertId();

        
        header('Location: ' ."../");
        exit();
    } else {
        echo "Ha habido un error al cargar tu archivo.";
    }
} else {
    echo "Error: el archivo no se ha cargado";
}
