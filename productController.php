<?php
class productController
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=crudAndrea', 'JamaHCS', 'acceso.jama');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM products");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $prod = new Product();

                $prod->__SET('id', $r->id);
                $prod->__SET('name', $r->name);
                $prod->__SET('description', $r->description);
                $prod->__SET('price', $r->price);

                $result[] = $prod;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM products WHERE id = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $prod = new Product();

            $prod->__SET('id', $r->id);
            $prod->__SET('name', $r->name);
            $prod->__SET('description', $r->description);
            $prod->__SET('price', $r->price);

            return $prod;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo
                      ->prepare("DELETE FROM products WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Product $data)
    {
        try {
            $sql = "UPDATE Products SET name=?, description= ?, price= ? WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                     array(
                    $data->__GET('name'),
                    $data->__GET('description'),
                    $data->__GET('price'),
                    $data->__GET('id')
                    )
                 );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Product $data)
    {
        try {
            $sql = "INSERT INTO Products (name,description,price) 
		        VALUES (?, ?, ?)";

            $this->pdo->prepare($sql)
             ->execute(
                 array(
                $data->__GET('name'),
                $data->__GET('description'),
                $data->__GET('price'),
                )
             );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
