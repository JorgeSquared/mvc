<?php

namespace Core;

use PDO;
use PDOException;

/**
 * Base model
 */
abstract class Model
{

    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB(): mixed
    {
        static $db = null;

        if ($db === null) {
            $host = 'localhost';
            $dbname = 'mvc';
            $username = 'root';
            $password = 'heslo';

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
                    $username, $password);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $db;
    }
}
