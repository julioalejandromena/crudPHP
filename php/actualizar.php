<?php

 include "coneccion.php";

 $Aid = $_POST["Aid"];
 $Anombre = $_POST["Anombre"];
 $Aemail = $_POST["Aemail"];
 $Acarrera = $_POST["Acarrera"];
 
 $sql = "UPDATE data SET nombre = '". $Anombre."', email= '".$Aemail."', carrera = '".$Acarrera."' where id = '".$Aid."'";

if(mysqli_query($conn, $sql))
{
    echo "Se Actualizaron los datos con exito!";
}
else
{
    echo "Error al Intentar actualizar los datos!" . mysqli_error($conn);
}

 //$conn->close();

?>