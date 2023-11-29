<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

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
        <form action="saveTask.php" method="POST">

          <div class="form-group">
            <input type="text" name="nombref" class="form-control" placeholder="id provedor" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="sucursalf"  class="form-control" placeholder="nombrecomercial" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="ubicacionf" class="form-control" placeholder="RFC" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="tipof" class="form-control" placeholder="nombre SAT" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="cantidadf" class="form-control" placeholder="tipo de producto" autofocus>
           </div>
          <div class="form-group">
            <input type="text" name="fechaf" class="form-control" placeholder="direccion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="formaf" class="form-control" placeholder="telefono" autofocus>
          </div>

          <input type="submit" name="saveTask" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>id provedor</th>
            <th>nombre comercial</th>
            <th>RFC</th>
            <th>nombre SAT</th>
            <th>tipo de producto</th>
            <th>direccion</th>
            <th>telefono</th>
           
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tbl_provedor";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['idprovedor']; ?></td>
            <td><?php echo $row['nombrecomercial']; ?></td>
            <td><?php echo $row['RFC']; ?></td>
            <td><?php echo $row['nombreSAT']; ?></td>
            <td><?php echo $row['tipodeproducto']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deleteTask.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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