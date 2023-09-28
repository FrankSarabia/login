<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <?php

    include 'conexion.php';

    if (isset($_POST['userName']) && isset($_POST['password'])) {
        $username = $_POST['userName'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];

        if ($password != $passwordConfirm) {
            echo 'Las contraseñas no coinciden';
            echo '<br><br><a href="/login/html/registro.html"><button>Volver</button></a>';
        } else {
            $sql_query = "SELECT * FROM users WHERE user = '$username'";
            $result = mysqli_query($conect, $sql_query) or die("Algo ha ido mal en la consulta a la base de datos");

            if (mysqli_num_rows($result) != 0) {
                echo 'Nombre de usuario ya existente';
                echo '<br><br><a href="/login/html/registro.html"><button>Volver</button></a>';

            } else {
                $sql_query = "SELECT id FROM users";
                $result = mysqli_query($conect, $sql_query) or die("Algo ha ido mal en la consulta a la base de datos");
                $id = mysqli_num_rows($result);
                $id_nueva = $id + 1;
                //echo 'Id nuevo: ' . $id_nueva;
                $sql_query = "INSERT INTO users VALUES ('$id_nueva','$username','$password')";
                $result = mysqli_query($conect, $sql_query) or die("Algo ha ido mal en la consulta a la base de datos");

                /*
                $sql_query = "SELECT * FROM users WHERE user = '$username'";
                $result = mysqli_query($conect, $sql_query) or die("Algo ha ido mal en la consulta a la base de datos");
                $row = mysqli_fetch_array($result);
                echo 'Usuario insertado:  '. $row['user'].'  Contraseña insertada:  '. $row['password']. '  Id insertado:  '. $row['id'];
                */

                echo 'Registro exitoso!';
                echo '<br><br><a href="/../login/index.html"><button>Volver</button></a>';
            }
        }
    }
    ?>
</body>

</html>