<?php

namespace App\Controllers;

use \Core\View;

/**
 * Posts controller
 */
class Posts extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction(): void
    {
        /*echo 'Hello from the index action in the Posts controller!';
        echo '<p>Query string parameters: <pre>' .
            htmlspecialchars(print_r($_GET, true)) . '</pre></p>';*/
        //echo 'Hello from the index action in the Posts controller!';
        View::renderTemplate('Posts/index.html');
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNewAction(): void
    {
        echo 'Hello from the addNew action in the Posts controller!';
    }

    /**
     * Show the edit page
     *
     * @return void
     */
    public function editAction(): void
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<p>Route parameters: <pre>' .
            htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}
