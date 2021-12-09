<?php
include("db.php");

$title = '';
$description= '';
// hace la consulta a la base de datos


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM estudiante WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $dni = $row['dni'];
    $correo = $row['correo'];
    $sexo = $row['sexo'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $dni = $_POST['dni'];
  $correo = $_POST['correo'];
  $sexo = $_POST['sexo'];

  $query = "UPDATE estudiante set nombre = '$nombre', apellido = '$apellido', dni = '$dni', correo = '$correo', sexo = '$sexo' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="actualizar nombre">
        </div>
        <div class="form-group">
          <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="actualizar apellido">
        </div>
       
        <div class="form-group">
          <input name="dni" type="text" class="form-control" value="<?php echo $dni; ?>" placeholder="actualizar DNI">
        </div>
        <div class="form-group">
          <input name="correo" type="text" class="form-control" value="<?php echo $correo; ?>" placeholder="actualizar correo">
        </div>
        <div class="form-group">
          <input name="sexo" type="text" class="form-control" value="<?php echo $sexo; ?>" placeholder="actualizar sexo">
        </div>
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
