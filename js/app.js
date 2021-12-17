document.getElementById("guardar").addEventListener("click", (e) => {
  e.preventDefault(); // prevee el calgamiento de la pagina

  var nombre = document.getElementById("nombre").value;
  var email = document.getElementById("email").value;
  var carrera = document.getElementById("carrera").value;

  if (nombre == "" || email == "" || carrera == "") {
    alert("Complete todos los Campos, por favor");
  } else {
    $.ajax({
      url: "php/guardar.php",
      method: "POST",
      data: { nombre, email, carrera },
    })
      .done(function (msg) {
        console.log("Data Saved: " + msg);
        $("#refrescarPagina").load("./index.php");

      })
      .fail(function (msg, status) {
        console.log("error " + status);
      });

    // Aqui limpiamos los campos
    var nombre = (document.getElementById("nombre").value = "");
    var email = (document.getElementById("email").value = "");
    var carrera = (document.getElementById("carrera").value = "");
  }
}); // Aqui guardamos los datos en la base de datos

document.getElementById("form_actualizar").addEventListener("submit", (e)=>
{
  e.preventDefault();
  
  var Aid = document.getElementById("Aid").value
  var Anombre = document.getElementById("Anombre").value
  var Aemail = document.getElementById("Aemail").value
  var Acarrera = document.getElementById("Acarrera").value
  
  $.ajax({
    url : "php/actualizar.php",
    method : "POST",
    data : {Aid, Anombre, Aemail, Acarrera}
  })
  .done((msg)=>{

    // alert("datos actualizados", msg)
    $("body").load("./index.php");
    
  })
  .fail((msg, status)=>{
    console.log("error ", status)
  })

  document.getElementById("Aid").value = ""
  document.getElementById("Anombre").value = ""
  document.getElementById("Aemail").value = ""
  document.getElementById("Acarrera").value = ""

}) // fin del boton actualizar

function eliminar(id)
{
  console.log(id)
  $.ajax({
    url : "php/eliminar.php",
    method : "POST",
    data : {id}
  })
  .done((msg)=>{

    alert("dato eliminado correctamente")
    $("#refrescarPagina").load("./index.php")
    
  })
  .fail((msg, status)=>{
    console.log("error al eliminar", status)
  })
}

function actualizar(dato) 
{
  
  date = dato.split("||");

  document.getElementById("Aid").value = date[0];
  document.getElementById("Anombre").value = date[1];
  document.getElementById("Aemail").value = date[2];
  document.getElementById("Acarrera").value = date[3];
}
