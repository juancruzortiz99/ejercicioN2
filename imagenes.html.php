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

    img {
        max-width: 100%;
        max-height: 100%;
    }
</style>

<body class="">

    <div class="container">
        <div class="row d-flex justify-content-center d-flex justify-content-center">
            <table class="table table-striped abs-center text-center">
                <tr class="table table-dark">
                    <th>ID</th>
                    <th>Nombre Imagen</th>
                    <th>descripcion</th>
                    <th></th>
                    <?php if ($_SESSION['email'] == 'admin@gmail.com') : ?>
                        <th></th>
                    <?php endif ?>

                </tr>
                <?php foreach ($imagenes as $imagen) : ?>
                    <tr class="align-content-md-between">

                        <td class=""> <?php echo $imagen['id']; ?> </td>
                        <td class=""><img src='./form/files/<?= $imagen['name']; ?>'></td>
                        <td class=""><?= $imagen['desc']; ?></td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $imagen['id']; ?>">
                            <td class=""><input type="submit" name="action" value="Vote" class="btn btn-success"></td>
                            <?php if ($_SESSION['email'] == 'admin@gmail.com') : ?>
                                <td class=""><input type="submit" name="action" value="Delete" class="btn btn-danger"></td>
                            <?php endif ?>
                        </form>

                    <?php endforeach; ?>
                    </tr>
            </table>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="./form/" class="btn btn-primary">Añadir imagen</a>

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