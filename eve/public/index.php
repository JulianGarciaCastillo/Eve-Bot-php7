<?php

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Mvc\Router;
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

$di->set(
"url",
function () {
    $url = new UrlProvider();
    
    $url->setBaseUri("http://localhost/Eve-Bot-php7/eve/public/");
    
    return $url;
}
);

// Register Volt as a service
$di->set(
"voltService",
function ($view, $di) {
    $volt = new Volt($view, $di);
    
    $volt->setOptions(
    [
    "compiledPath"      => "../app/templates/",
    "compiledExtension" => ".compiled",
    ]
    );
    
    return $volt;
}
);

// Register Volt as template engine
$di->set(
"view",
function () {
    $view = new View();
    
    $view->setViewsDir("../app/views/");
    
    $view->registerEngines(
    [
    ".volt" => "voltService",
    ]
    );
    
    return $view;
}
);

//Setup the database service
$di->set('db', function(){
    return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
    "host" => "localhost",
    "username" => "root",
    "password" => "605juli",
    "dbname" => "eve",
    "charset" => "utf8"
    ));
});

// Handling the application request
$application = new Application($di);
try {
    // Handle the request
    $response = $application->handle();
    
    $response->send();
} catch (\Exception $e) {
    echo "Exception: ", $e->getMessage();
}