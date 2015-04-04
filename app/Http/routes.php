<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// $client = new Elasticsearch\Client;
// $response = $client->nodes()->stats();
// $response = $client->cluster()->stats();

// echo '<pre>';
// print_r($response);
// die;

$router->get('/', function() {
   return \Redirect::to('/login');
});

// Authentication
$router->get('/login', ['uses' => 'PagesController@login']);
$router->post('/login', ['uses' => 'SessionsController@store']);
$router->get('/register', ['uses' => 'PagesController@register']);
$router->post('/register', ['uses' => 'AccountsController@store']);
$router->get('/logout', ['uses' => 'SessionsController@destroy']);

// Auth pages
$router->group(['middleware' => 'auth'], function() use ($router) {
   $router->get('/dashboard', ['uses' => 'DashboardsController@index']);

   // Clusters
   $router->get('/clusters/{clusterId}/nodes', ['uses' => 'ClustersController@index']);
   $router->get('/clusters/{clusterId}/indices/{indiceName}', ['uses' => 'IndicesController@show']);
   $router->resource('clusters', 'ClustersController');

   // // Indices
   // $router->get('/indices', ['uses' => 'IndicesController@index']);

   // // Mappings
   // $router->get('/mappings', ['uses' => 'MappingsController@index']);

   // // REST
   // $router->get('/rest/custom-query', ['uses' => 'RestController@custom_query']);
   // $router->get('/rest/insights', ['uses' => 'RestController@insights']);

   // // Stats
   // $router->get('/stats', ['uses' => 'StatsController@index']);

   // // Settings
   // $router->get('/settings', ['uses' => 'SettingsController@index']);
});


// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
