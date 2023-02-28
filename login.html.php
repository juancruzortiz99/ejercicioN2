<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body class="d-flex justify-content-md-center">

    <div class="container position-absolute top-50 start-50 translate-middle text-center">
        <div class="row">
            <div class="col-6 bg-success-subtle p-5 mb-2">
                <h1 class="primary">Log In</h1>
                <p>Please log in to view the page that you requested.</p>
                <?php if (isset($loginError)) : ?>
                    <p style="color: red"><?php echo ($loginError); ?></p>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="mt-5 mr-3">
                        <label for="email">Email: <input type="text" name="email" id="email"></label>
                    </div>
                    <div class="mt-5 mr-3">
                        <label for="password">Password: <input type="password" name="password" id="password"></label>
                    </div>
                    <div class="mt-5 mr-3">
                        <input type="hidden" name="action" value="login">
                        <input type="submit" value="Log in" class="btn btn-success">
                    </div>
                </form>
            </div>


            <div class="col-6 bg-info p-5 mb-2">

                <h1>Register</h1>

                <form action="" method="post">
                    <div class="mt-5 mr-3">
                        <label for="name">Nombre: <input type="text" name="name" id="name"></label>
                    </div>
                    <div class="mt-5 mr-3">
                        <label for="email">Email: <input type="text" name="email" id="email"></label>
                    </div>
                    <div class="mt-5 mr-3">
                        <label for="password">Password: <input type="password" name="password" id="password"></label>
                    </div>

                    <div class="mt-5 mr-3">
                        <input type="hidden" name="action" value="register">
                        <input type="submit" value="Register" class="btn btn-dark">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>