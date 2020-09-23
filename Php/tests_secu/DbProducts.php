<?php

class DbProducts
{
    /**@var PDO $pdo Connexion vers la base de données */
    private $pdo;

    /**
     * Initialisation de la base de données de test (ouverture de la connexion)
     */
    public function __construct()
    {
        try {
            $this->pdo = new \PDO(
                    'mysql:host=localhost;port=3306;dbname=tests_secu;charset=utf8mb4',
                    'root',
                    '',
                    [
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                        \PDO::ATTR_EMULATE_PREPARES => false
                    ]
                );
        } catch (\PDOException $e) {
            exit('Db Connection Error');
        }
    }

    public function getProducts()
    {
        $sql = "SELECT id,name,price,description FROM products;";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }

    public function getProduct(int $id)
    {
        $sql = "SELECT id,name,price,description FROM products WHERE id=".$id.";";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetch();
    }

    public function addProduct(string $name, float $price, string $description = null)
    {
        $sql = "INSERT INTO products 
                (name,price,description) 
                VALUES 
                ('".$name."', '".$price.", '".$description."')";

        echo $sql;

        // return $this->pdo->exec($sql);
    }

    public function updateProduct(int $id, string $name, float $price, string $description = null)
    {
        $sql = "UPDATE products SET 
                name='".$name."', 
                price='".$price."', 
                description='".$description."' 
                WHERE id='".$id."';";

        echo $sql;

        // return $this->pdo->exec($sql);
    }

    public function deleteProduct(int $id)
    {
        $sql = "DELETE FROM products WHERE id='".$id."';";

        echo $sql;

        // return $this->pdo->exec($sql);
    }
}
