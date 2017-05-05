<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;

class Users
{
    protected $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function overview($request, $response, $args)
    {
        echo 'xxx';

        return $response;
    }
}

