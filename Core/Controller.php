<?php

namespace Core;

/**
 * Base controller
 */
abstract class Controller
{

    /**
     * Parameters from the matched route
     * @var array
     */
    protected array $route_params = [];

    /**
     * Class constructor
     *
     * @param array $route_params  Parameters from the route
     * @return void
     */
    public function __construct(array $route_params)
    {
        $this->route_params = $route_params;
    }
}
