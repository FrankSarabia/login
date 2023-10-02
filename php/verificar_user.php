    <?php
   
    //echo json_encode(["Mensaje"=>"Hola"]);

    $username = $_POST['userName'];
    $password = $_POST['password'];

    include 'conexion.php';

    $response = array(); // Crear un arreglo para la respuesta
    
    if (isset($username) && isset($password)) {

        //echo 'Usuario insertado: ' . $username . '  Contrasenia insertada: ' . $password . '<br><br>';
        $sql_query = "SELECT * FROM users WHERE user = '$username'";
        $result = mysqli_query($conect, $sql_query) or die("Algo ha ido mal en la consulta a la base de datos");

        /*echo 'Usuario que se encontro en la db: ' . $row['user'] . '  Contrasenia que se encontro en la db: ' . $row['password'] . '<br><br>';
        var_dump($passwordHash);
        var_dump($password);*/
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $passwordHash = $row['password'];
            //echo 'Si encontro el usuario';
            if (password_verify($password, $passwordHash)) {
                // Autenticación exitosa
                $response['authenticated'] = true;
                $response['message'] = 'Autenticación exitosa';
                echo json_encode($response);
            } else {
                // Contraseña incorrecta
                $response['authenticated'] = false;
                $response['message'] = 'Contraseña incorrecta';
                echo json_encode($response);
            }
        } else {
            $response['authenticated'] = false;
            $response['message'] = 'Usuario no encontrado';
            echo json_encode($response);
        }
    }
    ?>