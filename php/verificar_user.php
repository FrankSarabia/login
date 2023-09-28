<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Usuario</title>
</head>

<body>
    <?php
    include 'conexion.php';

    if (isset($_POST['userName']) && isset($_POST['password'])) {
        $username = $_POST['userName'];
        $password = $_POST['password'];

        //echo 'Usuario insertado: ' . $username . '  Contrasenia insertada: ' . $password . '<br><br>';
        $sql_query = "SELECT * FROM users WHERE user = '$username'";
        $result = mysqli_query($conect, $sql_query) or die("Algo ha ido mal en la consulta a la base de datos");

        $row = mysqli_fetch_array($result);
        //echo 'Usuario que se encontro en la db: ' . $row['user'] . '  Contrasenia que se encontro en la db: ' . $row['password'] . '<br><br>';

        if (mysqli_num_rows($result) == 1) {
            //echo 'Si encontro el usuario';

            if ($password == $row['password']) {
                header('Location: /login/html/hola.html');
                exit();
            } else {
                //echo 'Contraseña incorrecta';
                echo 'Usuario o contraseña incorrecta';
                echo '<br><br><a href="index.html"><button>Volver</button></a>';
            }
        } else {
            //echo 'Usuario no encontrado';
            echo 'Usuario o contraseña incorrecta';
            echo '<br><br><a href="index.html"><button>Volver</button></a>';
        }
    }
    ?>
</body>

</html>