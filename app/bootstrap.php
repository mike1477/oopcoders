<?php
   session_start();

   // Create Slim app
    $app = new \Slim\App([
      'settings' => [
        'displayErrorDetails' => true,
      ]
    ]);

    // Fetch DI Container
    $container = $app->getContainer();

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
