<?php
  require '../tools/conexion.php';
  if (isset($_GET['id_emp'])) {
      $id = $_GET['id_emp'];
      $consulta = $conection->query('DELETE FROM empleado WHERE id_emp ='.$id);
      if (!$consulta) {
          die('Query failed');
      }
    
      header('Location: crudEmpleado.php');
  }
?>


