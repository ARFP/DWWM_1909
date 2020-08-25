<?php

namespace Models;

class Db
{
    private static $pdo = null;

    /**
     * Connexion PDO MySQL
     * @return \PDO 
     */
    public static function getDb(): \PDO
    {
        try 
        {
            if(self::$pdo === null) 
            {
                self::$pdo = new \PDO
                (
                    'mysql:host=localhost;port=3306;dbname=immo_du_chateau;charset=utf8', 
                    'root', 
                    '', 
                    [
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                        \PDO::ATTR_EMULATE_PREPARES => false
                    ]
                );
            }

            return self::$pdo;            
        } 
        catch (\PDOException $e) 
        {
            exit('Db Connection Error (1)');
        }
    }
}