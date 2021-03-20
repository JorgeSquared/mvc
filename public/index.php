<?php

/**
 * From now on, this file will serve as our front controller.
 * It is a place, where every URL is mapped to trigger a specific predefined action,
 * not like the other way round, where in the spaghetti-like projects, every single
 * URL maps to a specific *.php file, rendering the code unmaintainable
 */


echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';
echo 'Co obshauje proměnná $_SERVER: '; var_dump($_SERVER);