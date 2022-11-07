<?php

namespace App\Models;

use PDO;
use PDOException;

/**
 * Post model
 */
class Post extends \Core\Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array|PDOException
     */
    public static function getAll(): array|PDOException
    {
        try {
            $db = static::getDb();

            $stmt = $db->query('SELECT id, title, content FROM posts
                                ORDER BY created_at');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
