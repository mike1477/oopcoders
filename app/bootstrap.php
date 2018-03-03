<?php
   session_start();

   use Illuminate\Database\Capsule\Manager as Capsule;

   // Create Slim app
    $app = new \Slim\App([
      'settings' => [
        'displayErrorDetails' => true,
        'db' => [
              'driver'    => 'mysql',
              'host'      => 'localhost',
              'database'  => 'slimauth',
              'username'  => 'root',
              'password'  => '',
              'charset'   => 'utf8',
              'collation' => 'utf8_unicode_ci',
              'prefix'    => '',
          ]
      ]
     ]);

    // Fetch DI Container
    $container = $app->getContainer();

    //Create Capsule instance
    $capsule = new Capsule;
    $capsule->addConnection($container['settings']['db']);
    // Make this Capsule instance available globally via static methods... (optional)
    $capsule->setAsGlobal();
    // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
    $capsule->bootEloquent();

    //Add capsule to the container
    $container['db'] = function($container) use ($capsule){
      return $capsule;
    };

    // Register Twig View helper
    $container['view'] = function($container){
      $view = new \Slim\Views\Twig(__DIR__ . '/../app/views', [
         'cache' => false,
      ]);

      $view->addExtension(new \Slim\Views\TwigExtension(
         $container->router,
         $container->request->getUri()
      ));

      return $view;
    };
    // Add homeController instance to container
    $container['homeController'] = function($container){
     return new \App\controllers\homeController($container);
    };

   // Pull in all the routes
   require __DIR__ . "/../app/routes.php";

   // Run app
   $app->run();
