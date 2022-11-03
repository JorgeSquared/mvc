<?php

namespace App\Controllers;

/**
 * Posts controller
 */
class Posts
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index(): void
    {
        echo 'Hello from the index action in the Posts controller!';
        echo '<p>Query string parameters: <pre>' .
            htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNew(): void
    {
        echo 'Hello from the addNew action in the Posts controller!';
    }
}
