<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Users
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @param          $args
     *
     * @return Response
     */
    public function overview(Request $request, Response $response, $args)
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

    /**
     * @param Request  $request
     * @param Response $response
     * @param          $args
     *
     * @return Response
     */
    public function create(Request $request, Response $response, $args)
    {
        $validation = [
            'name' => '',
        ];

        $body = $request->getParsedBody();

        if (count(array_intersect_key($body, $validation)) <= 0) {
            return $response->withStatus(422, 'Required fields not provided');
        }

        /**
         * @var \PDO $db
         */
        $db = $this->container->get('db');

        try {
            $db->beginTransaction();

            $insertQuery = $db->prepare('INSERT INTO users (name) VALUES(:name)');
            $insertQuery->execute(['name' => $body['name']]);

            $db->commit();

        } catch (\Exception $exception) {
            $db->rollBack();

            return $response->withStatus(422, 'Insert failed');
        }


        $usersQuery = $db->prepare('SELECT id, name FROM users WHERE name = :name');
        $usersQuery->execute(['name' => $body['name']]);

        return $response->withJson([
            'user' => $usersQuery->fetchAll(),
        ]);
    }
}

