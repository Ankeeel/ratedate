<?php
use Phalcon\Mvc\Router\Group;

$admin = new Group(array(
    'namespace' => 'Modules\Frontend\Controllers',
    'module' => 'frontend',
));

$admin->addGet('/:controller/:action?', array(
        'controller'    => 'index',
        'action'        => 'index',
    )
);
$admin->addGet('/:controller', array(
        'controller'    => 'index',
        'action'        => 'index',
    )
);

$admin->addGet('/', array(
        'controller' => 'index',
        'action' => 'index'
    )
);

$admin->addGet('/:controller/:action/:params', array(
        'controller' => 1,
        'action' => 2,
        'params' => 3
    )
);

$admin->addPost('/:controller/:action/:params', array(
        'controller' => 1,
        'action' => 2,
        'params' => 3
    )
);



$router->mount($admin);