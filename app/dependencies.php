<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());
    $view->addExtension (new App\TwigExtension\diffForHumans());

    // Adding flash messages globally
    $view->getEnvironment()->addGlobal('flash', $c->flash);

    return $view;
};

// Flash messages
$container['flash'] = function ($c) {
    return new Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};

// -----------------------------------------------------------------------------
// Custom 404
// -----------------------------------------------------------------------------
//Override the default Not Found Handler
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        $c['view']->render($response, 'errors/404.twig');
        return $response->withStatus(404);
    };
};


// -----------------------------------------------------------------------------
// Database connection
// -----------------------------------------------------------------------------
$container['db'] = function ($c) {
    $settings = $c->get('settings')['db'];
        $pdo = new PDO(
            "mysql:host=" . $settings['host'] . 
            ";dbname=" . $settings['dbname'] . 
            ";charset=" . $settings['charset'],
            $settings['username'], $settings['password']);
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $pdo;
};

// -----------------------------------------------------------------------------
// Action factories ?
// -----------------------------------------------------------------------------
$container[App\Action\HomeAction::class] = function ($c) {
    return new App\Action\HomeAction($c->get('view'), $c->get('logger'));
};

// -----------------------------------------------------------------------------
// Controllers
// -----------------------------------------------------------------------------
/* The order of injection is important */
/* Worst case, inject $container->db */
$container['HomeController'] = function ($c){
    return new App\Controllers\HomeController($c->view,
                                              $c->logger,
                                              $c->flash);
};

// -----------------------------------------------------------------------------
// Model factories
// -----------------------------------------------------------------------------
$container['User'] = function ($container) {
    return new App\Models\User($container->get('db'));
};