<?php

namespace App\Controllers;

use Psr\Log\LoggerInterface as LoggerInterface;
use Slim\Flash\Messages as FlashMessages;
use Slim\Views\Twig as View;

use App\Models\User;

class HomeController
{
	protected $view;
	protected $logger;
	protected $flash;
	protected $user;

	public function __construct(View $view, LoggerInterface $logger, FlashMessages $flash, User $user)
	{
		$this->view = $view;
		$this->flash = $flash;
		$this->logger = $logger;
		$this->user = $user;
	}

	public function index($request, $response, $args)
	{
		
		$this->logger->info("Home page action dispatched");

		$query = $this->user->findOne('4');

		return $this->view->render($response, 'home.twig', ['query' => $query]);
	}

}