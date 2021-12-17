<?php

include "coneccion.php";

if(isset($_POST["nombre"]) || $_POST["email"] || $_POST["carrera"])
{
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $carrera = $_POST["carrera"];

    $sql = "INSERT INTO data (nombre, email, carrera)VALUES ('" . $nombre . " ', ' " . $email . "', '" . $carrera . "')";

    if($conn->query($sql) === true) 
    {
        echo " Nuevo registro guardado correctamente";
    }
    else
    {
        echo "Error " . $sql . " <br> " . $conn->error;
    }
}
else
{
    echo "Los campos deben estar Llenos!";
}


//$conn->close();

?>