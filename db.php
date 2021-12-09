<?php
session_start();

$conn = mysqli_connect(
  '127.0.0.1:3308', //servidor bases de datos
  'root',      // usuario
  '', //contraseña db
  'colegio' // tabla db
) or die(mysqli_erro($mysqli));
/*
if (isset($conn)){
  echo 'bases de datos no conectada';
}
//*/





?>

