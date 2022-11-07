<?php

namespace App\Models;

use PDO;
use PDOException;

/**
 * Post model
 */
class Post
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll(): array
    {
        $host = 'localhost';
        $dbname = 'mvc';
        $username = 'root';
        $password = 'heslo';

        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
                $username, $password);

            $stmt = $db->query('SELECT id, title, content FROM posts
                                ORDER BY created_at');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}