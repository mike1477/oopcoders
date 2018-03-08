<?php
   session_start();

   use Illuminate\Database\Capsule\Manager as Capsule;
   use Respect\Validation\Validator as v;

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
    // Add auth instance to container
    $container['auth'] = function ($container) {
      return new \App\auth\Auth;
     };
     //Add flash
     $container['flash'] = function () {
       return new \Slim\Flash\Messages();
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
      //Make auth a global variable so we can use it in the view
      $view->getEnvironment()->addGlobal('auth',[
                'check' => $container->auth->check(),
                'user'  => $container->auth->user(),
        ] );

        $view->getEnvironment()->addGlobal('flash', $container->flash );

      return $view;
    };
    // Add validator instance to container
    $container['validator'] = function($container){
     return new \App\validation\validator;
    };
    // Add homeController instance to container
    $container['homeController'] = function($container){
     return new \App\controllers\homeController($container);
    };
    // Add homeController instance to container
    $container['authController'] = function($container){
     return new \App\controllers\authController($container);
    };
    // Add passwordController instance to container
    $container['passwordController'] = function($container){
     return new \App\controllers\passwordController($container);
    };
    $container['csrf'] = function ($container) {
      return new \Slim\Csrf\Guard;
     };


    // Attach middlewqre
    $app->add(new \App\Middleware\ValidationErrorsMiddleware($container));
    $app->add(new \App\Middleware\OldInputMiddleWare($container));
    $app->add(new \App\Middleware\CsrfViewMiddleware($container));
    $app->add($container->csrf);

    // Form rules
    v::with('App\\validation\\rules\\');

   // Pull in all the routes
   require __DIR__ . "/../app/routes.php";

   // Run app
   $app->run();
