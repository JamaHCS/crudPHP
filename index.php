<?php
require_once './Product.php';
require_once './productController.php';

// Logica
$prod = new product();
$model = new productController();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'actualizar':
            $prod->__SET('id', $_REQUEST['id']);
            $prod->__SET('name', $_REQUEST['name']);
            $prod->__SET('description', $_REQUEST['description']);
            $prod->__SET('price', $_REQUEST['price']);

            $model->Actualizar($prod);
            header('Location: index.php');
            break;

        case 'registrar':
            $prod->__SET('name', $_REQUEST['name']);
            $prod->__SET('description', $_REQUEST['description']);
            $prod->__SET('price', $_REQUEST['price']);

            $model->Registrar($prod);
            header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
            header('Location: index.php');
            break;

        case 'editar':
            $prod = $model->Obtener($_REQUEST['id']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>BaseDatos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container pt-4">
        <div class="row">
            <form
                action="?action=<?php echo $prod->id > 0 ? 'actualizar' : 'registrar'; ?>"
                method="post" class="was-validated">
                <div class="form-row">
                    <div class="col-3">
                        <input type="hidden" name="id" id="id"
                            value="<?php echo $prod->__GET('id'); ?>"
                            class="form-control" required />
                    </div>

                    <div class="col-3">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name"
                            value="<?php echo $prod->__GET('name'); ?>"
                            class="form-control" required />
                    </div>

                    <div class="col-3">
                        <label for="description">Descripción:</label>
                        <input type="text" name="description" id="description"
                            value="<?php echo $prod->__GET('description'); ?>"
                            class="form-control" required />
                    </div>

                    <div class="col-3">
                        <label for="price">Precio:</label>
                        <input type="text" name="price" id="price"
                            value="<?php echo $prod->__GET('price'); ?>"
                            class="form-control" required />
                    </div>

                    <div class="col-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="container pt-4">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">nombre</th>
                            <th scope="col">descripcion</th>
                            <th scope="col">precio</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>

                        </tr>
                    </thead>
                    <?php foreach ($model->Listar() as $r): ?>
                    <tr>
                        <td><?php echo $r->__GET('id'); ?>
                        </td>
                        <td><?php echo $r->__GET('name'); ?>
                        </td>
                        <td><?php echo $r->__GET('description'); ?>
                        </td>
                        <td><?php echo $r->__GET('price'); ?>
                        </td>
                        <td>
                            <a href="?action=editar&id=<?php echo $r->id; ?>"
                                class="btn btn-warning">Editar</a>
                        </td>
                        <td>
                            <a href="?action=eliminar&id=<?php echo $r->id; ?>"
                                class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
</body>

</html>