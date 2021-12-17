<?php

include "coneccion.php";

$id = $_POST["id"];

$sql = "DELETE FROM data where Id = '" . $id . "'";

if(mysqli_query($conn, $sql))
{
    echo "Registro eliminado correctamente";
}
else
{
    echo "Error al Borrar registro" . mysqli_error($conn);
}

//mysqli_close($conn);

?>