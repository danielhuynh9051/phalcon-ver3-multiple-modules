<?php
namespace Service\Modules\Api;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\Dispatcher;
// For multiple database if you need
// use Phalcon\Db\Adapter\Pdo\Mysql;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Service\Modules\Api\Controllers' => __DIR__ . '/controllers/',
            'Service\Modules\Api\Models' => __DIR__ . '/models/',
        ]);

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
        * Setting up default Namespace
        */
        $di->set("dispatcher", function () {
            $dispatcher = new Dispatcher();

            $dispatcher->setDefaultNamespace("Service\Modules\Api\Controllers");

            return $dispatcher;
        });
        /**
         * Setting up the view component
         */
        $di->set('view', function () {
            $view = new View();
            $view->setDI($this);
            $view->setViewsDir(__DIR__ . '/views/');

            $view->registerEngines([
                '.volt'  => 'voltShared',
                '.phtml' => PhpEngine::class
            ]);

            return $view;
        });
        /**
        * Setting up database for this module
        * For multiple database if you need
        */
        // $di->set('db', function () {
        //     return new Mysql(
        //         [
        //             "host" => "localhost",
        //             "username" => "root",
        //             "password" => "12345",
        //             "dbname" => "test"
        //         ]
        //     );
        // });
    }
}
