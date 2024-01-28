<?php

if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email === 'user@gmail.com') {
        session_start();
        $_SESSION['email'] = $email;
        header('Location: ./Pages/dashboard.php');
        exit();
    }elseif($email === 'formateur@gmail.com'){
        session_start();
        $_SESSION['email'] = $email;
        header('Location: ./Pages/dashboard.php');
        exit();
    }else{
        header('refresh: 0');
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des brief</title>
    <link rel="stylesheet" href="./node_modules/admin-lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./asset/style.css">
    <script src="https://kit.fontawesome.com/3c520e368e.js" crossorigin="anonymous"></script>
</head>

<body class="hold-transition login-page">
    <div class="card">
        <div class="card-body login-card-body">
            <div class="login-box">
                <div class="login-box-body">
                    <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>
                    <form action="" method="post">
                        <div class="form-group has-feedback d-flex">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group has-feedback d-flex">
                            <input type="password" name="password" class="form-control" placeholder="Mot de pass">
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Souvenir de moi
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <input type="submit" class="btn btn-primary btn-block btn-flat" name="login" value="Connexion">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../node_modules/admin-lte/plugins/jquery/jquery.min.js"></script>
    <script src="../node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/admin-lte/dist/js/adminlte.min.js"></script>
</body>

</html>