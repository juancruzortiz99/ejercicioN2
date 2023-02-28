<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<style>
    table,
    td {
        border: 1px solid black;
        padding: 10px;
        text-align: center;
    }
</style>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center d-flex justify-content-center">
            <table class="table table-striped abs-center text-center">
                <tr class="table table-dark">
                    <th>ID</th>
                    <th>Nombre Imagen</th>
                    <th>descripcion</th>
                    <th>Votos</th>
                </tr>
                <?php foreach ($imagenes as $imagen) : ?>
                    <tr class="align-content-md-between">

                        <td> <?php echo $imagen['id']; ?> </td>
                        <td><img src='../form/files/<?= $imagen['name']; ?>'></td>
                        <td><?= $imagen['desc']; ?></td>
                        <td><?= $imagen['votos']; ?></td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $imagen['id']; ?>">
                        </form>

                    <?php endforeach; ?>
                    </tr>
            </table>
        </div>
        <div class="row">
            <div class="col-8">
                <a href="../" class="btn btn-primary">Home</a>
            </div>
            <div class="col-4">

                <form action="" method="post">
                    <div>
                        <input type="hidden" name="action" value="logout">
                        <input type="hidden" name="goto" value="/prueba">
                        <input type="submit" value="Log out" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>