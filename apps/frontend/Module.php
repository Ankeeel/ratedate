<?php

namespace Modules\Frontend;

use Phalcon\Mvc\Collection\Manager;
use MongoClient;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Mysql as MySQLAdapter;
use Phalcon\Session\Adapter\Files as Session;

class Module
{

    public function registerAutoloaders()
    {


        $loader = new Loader();

        $loader->registerNamespaces(array(
            'Modules\Frontend\Controllers' => __DIR__ . '/controllers/',
            'Models'=>__DIR__.'/../Models/',
            'Search'=>__DIR__.'/../Search/',
            'Objects'=>__DIR__.'/../Objects/'

        ));

        $loader->register();
    }

    public function registerServices(DiInterface $di)
    {

        /**
         * Read configuration
         */
        $config = require __DIR__ . "/config/config.php";

        $di['dispatcher'] = function () {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace("Modules\Frontend\Controllers");
            return $dispatcher;
        };

        /**
         * Setting up the view component
         */
        $di['view'] = function () {
            $view = new View();

            $view->setViewsDir(__DIR__ . '/views/');
            $view->setLayoutsDir(__DIR__ . '/views/');
            $view->setMainView('index');

            return $view;
        };

        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di['db'] = function () use ($config) {
            return new MySQLAdapter(array(
                "host" => $config->database->host,
                "username" => $config->database->username,
                "password" => $config->database->password,
                "dbname" => $config->database->name
            ));
        };
        $di->set('mongo', function () {
            $mongo = new \MongoClient();
            return $mongo->selectDB("randi");
        }, true);

        //Register a collection manager
        $di->set('collectionManager', function() {
            return new Manager();
        });

        $di->setShared(
            "session",
            function () {
                $session = new Session();

                $session->start();

                return $session;
            });
    }
}
