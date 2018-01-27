<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

//Les use que je rajoute
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Controller\UserController;
use Repository\UserRepository;
use Repository\TaskRepository;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());

$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

$app->register(
                new DoctrineServiceProvider(),
                [
                    'db.options' =>
                                    [
                                        'driver' => 'pdo_mysql',
                                        'host' => 'localhost',
                                        'dbname' => 'mini-api-rest',
                                        'user' => 'root',
                                        'password' => '',
                                        'charset' => 'utf8'
                                    ]
                ]
               );

//Pour pouvoir utiliser le gestionnaire de SESSION de Symfony (rien a ajouter par composer)
$app->register(new SessionServiceProvider());
            
/* Déclaration des CONTROLEURS en service */
$app['user.controller'] = function() use ($app)
{
    return new UserController($app);
};

/* Déclaration des REPOSITORIES en service */
$app['user.repository'] = function() use($app)
{
    return new UserRepository($app['db']);
};  
$app['task.repository'] = function() use($app)
{
    return new TaskRepository($app['db']);
};  

return $app;
