<?php

namespace Core;

/**
 * View
 */
class View
{

    /**
     * Render a view file
     *
     * @param string $view  The view file
     * @return void
     */
    public static function render(string $view): void
    {
        $file = "App/Views/$view";  // relative to root directory

        if (is_readable($file)) {
            require $file;
        } else {
            echo "$file not found";
        }
    }
}
