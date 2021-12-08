<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="guardar.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="apellido" class="form-control" placeholder="Ingrese sus Apellidos" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="dni" class="form-control" placeholder="ingrese su dni" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="correo" class="form-control" placeholder="ingrese su Correo" autofocus>
          </div>
          <div class="form-group">
            <select class="form-control" name="sexo" aria-label="Default select example">
              <option selected>Ingrese su Sexo</option>
              <option value="masculino">masculino</option>
              <option value="femenino">femenino</option>
              
            </select>
          </div>
          <input type="submit" name="guardar" class="btn btn-success btn-block"  value="guardar alumno">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Correo</th>
            <th>Sexo</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM estudiante";
          $result_estudiante = mysqli_query($conn, $query);    
          //while($row = mysqli_fetch_assoc($resutados))

          while($row = mysqli_fetch_array($result_estudiante)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['dni']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['sexo']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

