<?php
  require '../tools/conexion.php';
  if (isset($_GET['id_emp'])) {
    $id = $_GET['id_emp'];
    $query = $conection->query('SELECT * FROM empleado WHERE id_emp ='.$id);
    if (mysqli_num_rows($query) == 1) {
      $row = mysqli_fetch_array($query);
      $nombre = $row['n1_emp'];
      $segundoNombre = $row['n2_emp'];
      $apellidoPaterno = $row['ap_emp'];
      $apellidoMaterno = $row['am_emp'];
      $telefono = $row['tel_emp'];
      $colonia = $row['col_emp'];
      $calle = $row['call_emp'];
      $codigoPostal = $row['cp_emp'];
      $numeroInterior = $row['ni_emp'];
      $numeroExterior = $row['ne_emp'];
      $puesto = $row['pues_emp'];
      $sucursal = $row['id_suc'];
      $ciudad = $row['id_ciu'];
      $estatus = $row['est_emp'];
      $email = $row['email_usu'];
    }
  }
?>
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
            <h1>Editar empleado</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Inicio</a></li>
              <li class="breadcrumb-item active">Editar empleado</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Aquí va tu contenido HTML -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Formulario</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="updateEmpleado.php?id_emp=<?php echo $id; ?>" method="POST">
            <div class="card-body">

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label for="id">Password:</label>
                    <input type="number" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-group">
                    <label>Sucursal: </label>
                    <select class="form-control select2" style="width: 100%;" id="sucursal" name="sucursal">
                      <?php
                         require '../tools/conexion.php';
                        $consulta = $conection->query("SELECT id_suc, nom_suc FROM sucursal WHERE id_suc = $sucursal");
                        while($datos = mysqli_fetch_array($consulta)){
                          $nom_suc = utf8_encode($datos['nom_suc']);
                      ?>
                      <option selected="selected"><?php echo $nom_suc ?></option>
                      <?php
                    }
                        require '../tools/conexion.php';
                        $consulta = $conection->query("SELECT id_suc, nom_suc FROM sucursal");
                        while($datos = mysqli_fetch_array($consulta)){
                          $nom_suc = utf8_encode($datos['nom_suc']);
                      ?>
                        <option value="<?php echo $datos['id_suc'];?>";><?php echo $nom_suc; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                  </div>
                </div>

                 <div class="col-4">
                  <div class="form-group">
                    <label>Ciudad: </label>
                    <select class="form-control select2" style="width: 100%;" id="ciudad" name="ciudad">
                      <?php
                          require '../tools/conexion.php';
                         $consulta = $conection->query("SELECT id_ciu, nom_ciu FROM ciudad WHERE id_ciu = $ciudad"); 
                         while($datos = mysqli_fetch_array($consulta)){
                          $nom_ciu = utf8_encode($datos['nom_ciu']);
                      ?>
                      <option selected="selected"><?php echo $nom_ciu; ?></option>
                      <?php
                    }
                    ?>
                      <?php
                        require '../tools/conexion.php';
                        $consulta = $conection->query("SELECT id_ciu, nom_ciu FROM ciudad");
                        while($datos = mysqli_fetch_array($consulta)){
                          $nom_ciu = utf8_encode($datos['nom_ciu']);
                      ?>
                        <option value="<?php echo $datos['id_ciu'];?>";><?php echo $nom_ciu; ?></option>
                        <?php
                        }
                        ?>

                     </select>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-3">
                  <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id= "nombre" name="nombre" value="<?php echo $nombre; ?>" placeholder = "Update Name">
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-group">
                    <label for="nombreDos">Segundo nombre: </label>
                    <input type="text" class="form-control" id="nombreDos" name="nombreDos" placeholder="Update second name" value="<?php echo $segundoNombre; ?>">
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="apellidoPaterno">Apellido Paterno: </label>
                    <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Update Apellido Paterno" value="<?php echo $apellidoPaterno; ?>">
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="apellidoMaterno">Apellido Materno: </label>
                    <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Update Apellido Materno" value="<?php echo $apellidoMaterno; ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-2">
                  <div class="form-group">
                    <label for="colonia">Colonia: </label>
                    <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Update Colonia" value="<?php echo $colonia; ?>">
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="calle">Calle: </label>
                    <input type="text" class="form-control" id="calle" name="calle" placeholder=" Update Calle" value="<?php echo $calle; ?>">> 
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="numeroInterior">Número interior: </label>
                    <input type="text" class="form-control" id="numeroInterior" name="numeroInterior" placeholder="Update Número interior" value="<?php echo $numeroInterior; ?>">
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="numeroExterior">Número exterior: </label>
                    <input type="text" class="form-control" id="numeroExterior" name="numeroExterior" placeholder="Update Número exterior" value="<?php echo $numeroExterior; ?>">
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="codigoPostal">Código postal: </label>
                    <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="Update Código postal" value="<?php echo $codigoPostal; ?>">
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="telefono">Teléfono: </label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Update Teléfono" value="<?php echo $telefono; ?>">
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-4">
                  <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <input type="text" class="form-control" id="correo" name="correo" placeholder="Update example@gmail.com" value="<?php echo $email; ?>">
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-group">
                    <label>Puesto: </label>
                    <select class="form-control select2" style="width: 100%;" id="puesto" name="puesto">
                      <option selected="selected"><?php echo $puesto; ?></option>
                      <option>Vendedor</option>
                      <option>Gerente</option>
                    </select>
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-group">
                    <label for="inpEstatus">Estatus:</label>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="inpEstatus" name="inpEstatus">
                      <label for="inpEstatus" class="custom-control-label">Activo</label>
                      </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="inpEstatus2" name="inpEstatus">
                      <label for="inpEstatus2" class="custom-control-label">Inactivo</label>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-block btn-primary" id="save">Guardar</button>
            </div>
          </form>
        </div>

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
