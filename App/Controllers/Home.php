<?php

namespace App\Controllers;

/**
 * Home controller
 */
class Home extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return bool
     */
    protected function before(): bool
    {
        echo "(before) ";
        return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after(): void
    {
        echo " (after)";
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction(): void
    {
        echo 'Hello from the index action in the Home controller!';
    }
}
