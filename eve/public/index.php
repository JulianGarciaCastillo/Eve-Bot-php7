<?php

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\Application;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;


$loader = new Loader();

$loader->registerDirs(
[
"../app/controllers/",
"../app/models/",
]
);

$loader->register();

// Create a DI injector
$di = new FactoryDefault();

// Setup the view component
$di->set(
"view",
function () {
    $view = new View();
    
    $view->setViewsDir("../app/views/");
    
    return $view;
}
);

// Setup a base URI so that all generated URIs include the "tutorial" folder
$di->set(
"url",
function () {
    $url = new UrlProvider();
    
    $url->setBaseUri("/eve/");
    
    return $url;
}
);

// Handling the application request
$application = new Application($di);
try {
    // Handle the request
    $response = $application->handle();
    
    $response->send();
} catch (\Exception $e) {
    echo "Exception: ", $e->getMessage();
}