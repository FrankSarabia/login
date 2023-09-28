<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion</title>
</head>
<body>
    <?php
    $db_host="localhost";
    $db_name="test";
    $db_pass="";
    $db_user="root";

    $conect=mysqli_connect($db_host, $db_user, "", $db_name);

    if(!$conect){
        die('Error al conectar co la base de datos: '.mysqli_connect_error());
    }
    /*else{
        echo'Conexion exitosa';
    
    $consulta='SELECT * FROM users';
    $resultado = mysqli_query( $conect, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    
    while ($columna = mysqli_fetch_array( $resultado))
    {
        echo "<tr>";
        echo "<td>" . $columna['id'] . "</td><td>" . $columna['user'] . "</td><td>".$columna['password']."</td>";
        echo "</tr>";
    }
    }*/
    ?>
</body>
</html>