<?php
include("db.php");
$nombre = '';
$sucu= '';
$ubicacion='';
$tipo='';
$cantidad='';
$fecha='';
$forma='';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tbl_provedor WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['idprovedor'];
    $sucu = $row['nombrecomercial'];
    $ubicacion = $row['RFC'];
    $tipo = $row['nombreSAT'];
    $cantidad = $row['tipodeproducto'];
    $fecha = $row['direccion'];
    $forma = $row['telefono'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombref'];
  $sucu = $_POST['sucursalf'];
  $ubicacion = $_POST['ubicacionf'];
  $tipo = $_POST['tipof'];
  $cantidad = $_POST['cantidadf'];
  $fecha = $_POST['fechaf'];
  $forma = $_POST['formaf'];

  $query = "UPDATE tbl_provedor set idprovedor = '$nombre', nombrecomercial = '$sucu', RFC = '$ubicacion', nombreSAT = '$tipo', tipodeproducto = '$cantidad', direccion = '$fecha', telefono = '$forma' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con Exito';
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
          <input name="nombref" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="id provedor">
        </div>
        <div class="form-group">
        <input name="sucursalf" type="text "class="form-control" value="<?php echo $sucu;?>"placeholder="nombre comercial">
        </div>
        <div class="form-group">
        <input name="ubicacionf" type="text"class="form-control" value="<?php echo $ubicacion;?>"placeholder="RFC">
        </div>
        <div class="form-group">
        <input name="tipof" type="text"class="form-control" value="<?php echo $tipo;?>"placeholder="nombre SAT">
        </div>
        <div class="form-group">
        <input name="cantidadf" type="text"class="form-control" value="<?php echo $cantidad;?>"placeholder="tipo de producto">
        </div>
        <div class="form-group">
        <input name="fechaf" type="text"class="form-control" value="<?php echo $fecha;?>"placeholder="direccion">
        </div>
        <div class="form-group">
        <input name="formaf" type="text"class="form-control" value="<?php echo $forma;?>"placeholder="telefono">
        </div>
        <button class="btn-success" name="update">
         Guardar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>