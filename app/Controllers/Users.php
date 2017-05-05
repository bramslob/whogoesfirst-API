<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;

class Users
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function overview($request, $response, $args)
    {
        return $response->withJson([
            'x' => 'y',
        ]);
    }
}

