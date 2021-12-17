<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- JQUERY CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- BOOSTRAP CDN-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- FONTAWESOME -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
      crossorigin="anonymous"
    />

    <title>PHP, AJAX y MYSQL</title>
  </head>
  <body style="background-color: whitesmoke">
    <div class="container" id="refrescarPagina">
      <div class="row">
        <h2 class="text-center bg-danger p-2 mt-2">Datos de Usuario</h2>
        <div class="col-4">
          <div class="card m-auto" style="width: 18rem">
            <form class="card-body bg-success ">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                  >Nombre</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="nombre"
                  placeholder="Escribe tu nombre"
                />
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                  >Direccion de Email</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="Nombre@ejemplo.com"
                />
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                  >Carrera</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="carrera"
                  placeholder="Escribe tu carrera"
                />
              </div>
              <div class="mb-3">
                <button class="btn btn-primary btn-block" id="guardar" >
                  Guardar
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-8">
          <table class="table bg-info" id="tabla">
            <?php
            
            require "php/coneccion.php";

            $sql = "SELECT Id, nombre, email, carrera FROM data";

            $result = mysqli_query($conn, $sql);
            
            if($result->num_rows != 0){ ?>
               <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Email</th>
                  <th scope="col">Carrera</th>
                  <th scope="col">Botones</th>
                </tr>
            </thead>
            <?php           
            
            while($row = mysqli_fetch_array($result)) {
              
              $datos = $row[0] . "||" . $row[1] . "||" .$row[2] . "||" .$row[3];

              ?>
            <tbody>
             <tr>
               <th scope="row"><?php echo $row[0]; ?></th>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td>
                  <button class="btn btn-warning" id="editar" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-pencil-alt" onclick="actualizar('<?php echo $datos;?>');"></i>
                  </button>
                  <button class="btn btn-danger" id="borrar" onclick="eliminar('<?php echo $row[0]; ?>');">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
               </tr> 
            </tbody>
            <?php }}else{ ?>
              <h1>No hay Registro para Mostrar</h1>
              <?php } mysqli_close($conn);?>   
          </table>
        </div>
      </div>

      <!-- MODAL  -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Datos del Usuario que vas Editar</h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            
            <form class="card-body bg-success" id="form_actualizar">
              <div class="mb-3" style="display:none">
                  <label for="exampleFormControlInput1" class="form-label"
                    >Id</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="Aid"
                    name="Aid"
                    placeholder="Escribe tu nombre"
                  />
                </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                  >Nombre</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="Anombre"
                  name="Anombre"
                  placeholder="Escribe tu nombre"
                />
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                  >Direccion de Email</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="Aemail"
                  name="Aemail"
                  placeholder="Nombre@ejemplo.com"
                />
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                  >Carrera</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="Acarrera"
                  name="Acarrera"
                  placeholder="Escribe tu carrera"
                />
              </div>
              <div class="mb-3">
                <button class="btn btn-primary btn-block" id="actualizar">
                  Actualizar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- FIN MODAL -->
    </div>

    <!-- MI CODIGO JAVASCRIPT -->
    <script src="js/app.js"></script>
  </body>
</html>
