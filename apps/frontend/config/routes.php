<?php
use Phalcon\Mvc\Router\Group;

$admin = new Group(array(
    'namespace' => 'Modules\Frontend\Controllers',
    'module' => 'frontend',
));

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

$admin->addGet('/:controller/:action', array(
        'controller' => 1,
        'action' => 2
    )
);

$admin->addPost('/bekuld',array(
        'controller'=>'register',
        'action' => 'bekuld'
    )
);

$admin->addPost('/:controller/save', array(
        'controller' => 1,
        'action' => 'save'
    )
);

$admin->addPost('/:controller/:action', array(
        'controller' => 1,
        'action' => 2
    )
);

$router->mount($admin);