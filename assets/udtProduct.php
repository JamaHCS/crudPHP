<?php
  require '../tools/conexion.php';
  if (isset($_REQUEST['id_emp'])) {
    $id = $_REQUEST['id_emp'];
    echo $id;
      $nombre = $_POST['nombre'];
      $segundoNombre = $_POST['nombreDos'];
      $apellidoPaterno = $_POST['apellidoPaterno'];
      $apellidoMaterno = $_POST['apellidoMaterno'];
      $telefono = $_POST['telefono'];
      $colonia = $_POST['colonia'];
      $calle = $_POST['calle'];
      $codigoPostal = $_POST['codigoPostal'];
      $numeroInterior = $_POST['numeroInterior'];
      $numeroExterior = $_POST['numeroExterior'];
      $puesto = $_POST['puesto'];
      $sucursal = $_POST['id_suc'];
      $ciudad = $_POST['id_ciu'];
      $estatus = $_POST['est_emp'];
      $email = $_POST['email_usu'];

      $consulta = $conection->query("UPDATE empleado SET n1_emp = '.$nombre.' WHERE id_emp = $id");
    if ($consulta) {
      echo "UPDATE empleado SET n1_emp = $nombre WHERE id_emp = $id";
      /*
      die('Query failed');
      */
    }else{
      echo "No entre";
      echo "UPDATE  empleado SET n1_emp = $nombre WHERE id_emp = $id";
    }
    //header('Location: crudEmpleado.php');
    
  }
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Placencia</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=