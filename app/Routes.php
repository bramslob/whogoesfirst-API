<?php

$app->group('/api', function () {
    $this->group('/v1', function () {
        $this->group('/users', function () {
            $this->get('', \App\Controllers\Users::class . ':overview');
        });
    });
});