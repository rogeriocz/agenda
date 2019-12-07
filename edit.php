<?php
include("db.php");
$nombre = '';
$email= '';
$tfno_casa= '';
$tfno_movil= '';
if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM datos WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $email = $row['email'];
    $tfno_casa = $row['tfno_casa'];
    $tfno_movil = $row['tfno_movil'];
  }
}
if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $email= $_POST['email'];
  $tfno_casa= $_POST['tfno_casa'];
  $tfno_movil= $_POST['tfno_movil'];
  
  $query = "UPDATE datos set nombre = '$nombre', email = '$email', tfno_casa = '$tfno_casa', tfno_movil = '$tfno_movil' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Datos actualizados';
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
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="email" type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="tfno_casa" type="text" class="form-control" value="<?php echo $tfno_casa; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="tfno_movil" type="text" class="form-control" value="<?php echo $tfno_movil; ?>" placeholder="Update Title">
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