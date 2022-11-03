<?php

namespace App\Controllers\Admin;

/**
 * User admin controller
 */
class Users extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return bool
     */
    protected function before(): bool
    {
        // Make sure an admin user is logged in for example
        return true;
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction(): void
    {
        echo 'User admin index';
    }
}
