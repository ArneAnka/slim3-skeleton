# Slim 3 Skeleton

This is a simple skeleton project for Slim 3 that includes Twig, TwigExtension, Flash messages, Monolog and PDO connection.

## Create your project:

    $ git clone https://github.com/arneanka/slim3-boilerplate
    $ composer update

### Run it:

1. `$ cd my-app`
2. `$ php -S 0.0.0.0:8888 -t public public/index.php`
3. Browse to http://localhost:8888

## Key directories

* `app`: Application code
* `app/src`: All class files within the `App` namespace
* `resources/views`: Twig template files
* `cache/twig`: Twig's Autocreated cache files
* `log`: Log files
* `public`: Webserver root
* `vendor`: Composer dependencies

## Key files

* `public/index.php`: Entry point to application
* `app/settings.php`: Configuration
* `app/dependencies.php`: Services for Pimple
* `app/middleware.php`: Application middleware
* `app/routes.php`: All application routes are here
* `app/src/Action/HomeAction.php`: Action class for the home page
* `app/src/Controllers/HomeAction.php`: Home controller for the home page
* `resources/views/home.twig`: Twig template file for the home page

## TODO
* Models to use PDO
* Sign up
* Sign in
* Simple CRUD