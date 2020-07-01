<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Placencia</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="../imagenes/logosplacencia.png">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
    <?php include_once("composants/navBar.php"); ?>
  <!-- /.navbar -->

  <!-- Sidebar Container -->
    <?php include_once("composants/sideBar.php"); ?>
  <!-- /. Sidebar -->
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Información de empleados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Inicio</a></li>
              <li class="breadcrumb-item active">Información de emplados</li>
            </ol>
          </div>
          <table>
            <tr>
              <td>ID</td>
              <td>Nombre</td>
              <td>Segundo nombre</td>
              <td>Apellido Paterno</td>
              <td>Apellido Materno</td>
              <td>Teléfono</td>
              <td>Colonia</td>
              <td>Calle</td>
              <td>Código postal</td>
              <td>Número interior</td>
              <td>Número exterior</td>
              <td>Puesto empleado</td>
              <td>Sucursal</td>
              <td>Ciudad</td>
              <td>Estatus</td>
              <td>Email</td>
           </tr>
            <?php
              require '../tools/conexion.php';
              if (isset($_GET['id_emp'])) {
                $id = $_GET['id_emp'];
                echo $id;
                $consulta = $conection->query('SELECT * FROM empleado WHERE id_emp ='.$id);
                while($row = mysqli_fetch_array($consulta)) {
                ?>
                  <tr>
                  <td><?php echo $row['id_emp']?></td>
                  <td><?php echo $row['n1_emp']?></td>
                  <td><?php echo $row['n2_emp']?></td>
                  <td><?php echo $row['ap_emp']?></td>
                  <td><?php echo $row['am_emp']?></td>
                  <td><?php echo $row['tel_emp']?></td>
                  <td><?php echo $row['col_emp']?></td>
                  <td><?php echo $row['call_emp']?></td>
                  <td><?php echo $row['cp_emp']?></td>
                  <td><?php echo $row['ni_emp']?></td>
                  <td><?php echo $row['ne_emp']?></td>
                  <td><?php echo $row['pues_emp']?></td>
                  <td><?php echo $row['id_suc']?></td>
                  <td><?php echo $row['id_ciu']?></td>
                  <td><?php echo $row['est_emp']?></td>
                  <td><?php echo $row['email_usu']?></td>
                </tr>
                <?php
                } 
            }
            ?>
          </table>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Aquí va tu contenido HTML -->
      
      <!-- /.Aquí termina tu contenido -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
    <?php include_once("composants/footeR.php"); ?>
  <!-- ./footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
