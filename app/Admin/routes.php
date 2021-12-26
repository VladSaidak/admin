<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('menus', MenuController::class);
    $router->resource('menu-types', MenuTypeController::class);
    $router->resource('users', UserController::class);
    $router->resource('headsects', HeadsectController::class);
    $router->resource('blocks-items', BlockController::class);
    $router->resource('events', EventController::class);
    $router->resource('contacts', ContactController::class);
    $router->resource('recipients', RecipientController::class);
    $router->resource('post-tasks', PostTasksController::class);
    $router->resource('page-headers', PageHeaderController::class);
    $router->resource('page-header-lists', PageHeaderListController::class);
    $router->resource('logos', LogoController::class);
    $router->resource('informations-types', InformationsTypeController::class);
    $router->resource('informations', InformationsController::class);



});
