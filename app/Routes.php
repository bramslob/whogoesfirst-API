<?php

$app->group('/api', function () {
    $this->group('/v1', function () {

        $this->get('', function($request, $response) {

            return $response->withJson(['data' => 'Welcome']);
        });

        $this->group('/users', function () {
            $this->get('', \App\Controllers\Users::class . ':overview');
            $this->post('', \App\Controllers\Users::class . ':create');
        });
    });
});