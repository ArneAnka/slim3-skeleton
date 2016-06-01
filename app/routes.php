<?php
// Routes

// $app->get('/', App\Action\HomeAction::class)
//     ->setName('homepage');

$app->get('/', 'HomeController:index')->setName('homepage');

// Render a view immediately with and arg
$app->get('/@{user}', function ($request, $response, $args) {
	return $this->view->render($response, 'hello.twig', ['name' => $args['user']]);
    // return 'Hello ' . $args['user'] .', nice to meet you!';
});

/* Send the slug/argument to a controller.
* Define the function, in this case `showProfile`.
* public function showProfile($request, $response, $args){ return $args['user']; }
*
$app->get('/@{user}', 'HomeController:showProfile');
*/