<?php
include('db.php');
if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $tfno_casa = $_POST['tfno_casa'];
  $tfno_movil = $_POST['tfno_movil'];
  
  $query = "INSERT INTO datos(nombre, email, tfno_casa, tfno_movil) VALUES ('$nombre', '$email', '$tfno_casa', '$tfno_movil')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Datos guardados';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');
}
?>