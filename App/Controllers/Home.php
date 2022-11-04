<?php

namespace App\Controllers;

use \Core\View;

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
        //echo "(before) ";
        return true;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after(): void
    {
        //echo " (after)";
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction(): void
    {
        View::render('Home/index.php', [
            'name'    => 'Jirka',
            'colours' => ['red', 'green', 'blue']
        ]);
    }
}
