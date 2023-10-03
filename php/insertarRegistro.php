<?php

include 'conexion.php';

$username = $_POST['userName'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$email = $_POST['email'];

$response = array();

if (isset($username) && isset($password) && isset($passwordConfirm) && isset($email)) {

    $sql_query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conect, $sql_query) or die("Algo ha ido mal en la consulta a la base de datos");
    if (mysqli_num_rows($result) != 0) {
        $response['emailExistente'] = true;
        $response['mensageEmail'] = 'Email ya registrado';
    } else {
        $response['emailExistente'] = false;
        $response['mensageEmail'] = 'Email no registrado';
    }

    if ($password != $passwordConfirm) {
        $response['passwordIgual'] = false;
        $response['mensagePass'] = 'Las contraseñas no coinciden';
    } else {
        $response['passwordIgual'] = true;
        $response['mensagePass'] = 'Las contraseñas coinciden';
    }

    $sql_query = "SELECT * FROM users WHERE user = '$username'";
    $result = mysqli_query($conect, $sql_query) or die("Algo ha ido mal en la consulta a la base de datos");
    if (mysqli_num_rows($result) != 0) {
        $response['usuarioExistente'] = true;
        $response['mensageUser'] = 'Nombre de usuario ya existente';
    } else {
        $response['usuarioExistente'] = false;
        $response['mensageUser'] = 'Nombre de usuario nuevo';
    }

    echo json_encode($response);
    if (!($response['usuarioExistente']) && !($response['emailExistente']) && $response['passwordIgual']) {
        $sql_query = "SELECT id FROM users";
        $result = mysqli_query($conect, $sql_query) or die("Algo ha ido mal en la consulta a la base de datos");
        $id = mysqli_num_rows($result);
        $id_nueva = $id + 1;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql_query = "INSERT INTO users VALUES ('$id_nueva','$username','$hashedPassword','$email')";
        $result = mysqli_query($conect, $sql_query) or die("Algo ha ido mal en la consulta a la base de datos");
    }
}
?>