<?php

include('db.php');
/* se realiza la prueba si llega la informacion por post
if (isset($_POST['guardar'])){

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $dni = $_POST['dni'];
  $correo = $_POST['correo'];
  $sexo = $_POST['sexo'];

  echo $nombre.' ';
  echo $apellido;
  echo $dni;
  echo $correo;
  echo $sexo;
}else{
  echo 'no se gusardara';
}
*/
if (isset($_POST['guardar'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $dni = $_POST['dni'];
  $correo = $_POST['correo'];
  $sexo = $_POST['sexo'];


  $query = "INSERT INTO estudiante(nombre, apellido, dni, correo, sexo) 
  VALUES ('$nombre', '$apellido', '$dni', '$correo', '$sexo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
