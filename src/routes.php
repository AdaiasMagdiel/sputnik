<?php

namespace AdaiasMagdiel\Sputnik;

use AdaiasMagdiel\Hermes\Router;
use AdaiasMagdiel\Sputnik\Controllers\LinkController;

$controller = new LinkController();

Router::initialize();

Router::get('/', fn () => $controller->index());
Router::post('/', fn () => $controller->create());
Router::get('/[id]', fn (string $id) => $controller->get($id));

Router::execute();
