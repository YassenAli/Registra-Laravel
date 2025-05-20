<?php

if (!function_exists('active_class')) {
    function active_class($condition)
    {
        return $condition ? 'active' : '';
    }
}

if (!function_exists('if_route')) {
    function if_route($route)
    {
        return request()->routeIs($route);
    }
}
