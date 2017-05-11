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
        /**
         * @var \PDO $db
         */
        $db = $this->container->get('db');

        $usersQuery = $db->prepare('SELECT id, name FROM users');
        $usersQuery->execute();

        return $response->withJson([
            'users' => $usersQuery->fetchAll(),
        ]);
    }
}

