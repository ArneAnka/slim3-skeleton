<?php
// Routes

// $app->get('/', App\Action\HomeAction::class)
//     ->setName('homepage');

$app->get('/', 'HomeController:index')->setName('homepage');

$app->get('/@{user}', function ($request, $response, $args) {
	return $this->view->render($response, 'hello.twig', ['name' => $args['user']]);
    // return 'Hello ' . $args['user'] .', nice to meet you!';
});