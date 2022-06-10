<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $base_datos = "init";

    $enlace = mysqli_connect($servidor, $usuario, $password, $base_datos);

    if(!$enlace){
        echo "Error: No se pudo conectar a MySQL.";
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/signin.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico"/>
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form>
            <a href="index.html"><img class="mb-4" src="./img/logo2-removebg-preview.png" alt="" width="322" height="131"></a>
            <h1 class="h3 mb-3 fw-normal">Please Log In</h1>

            <div class="form-floating">
                <input name="correo" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button name="logIn" class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
        </form>
    </main>


</body>

</html>

<?php
    if(isset($_POST["logIn"])){
        $correo = $_POST["correo"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND password = '$password'";
        $resultado = mysqli_query($enlace, $sql);

        if(mysqli_num_rows($resultado) > 0){
            echo "Usuario encontrado";
        }else{
            echo "Usuario no encontrado";
        }
    }
?>