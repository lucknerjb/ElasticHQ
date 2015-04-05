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
   $router->post('/clusters/select_cluster', ['uses' => 'ClustersController@select_cluster']);

   // Routes depending on currentCluster
   $router->get('/cluster', ['uses' => 'ClustersController@show']);
   $router->get('/indices', ['uses' => 'IndicesController@index']);
   $router->get('/indices/{indiceName}', ['uses' => 'IndicesController@show']);
   $router->get('/indices/{indiceName}/mappings', ['uses' => 'IndicesController@mappings']);
   $router->get('/indices/{indiceName}/mappings/{typeName}', ['uses' => 'MappingsController@show']);
   $router->get('/indices/{indiceName}/aliases', ['uses' => 'IndicesController@aliases']);
   $router->get('/indices/{indiceName}/shards', ['uses' => 'IndicesController@shards']);
   $router->get('/indices/{indiceName}/manage', ['uses' => 'IndicesController@manage']);
   $router->get('/indices/{indiceName}/documents/{id}', ['uses' => 'DocumentsController@show']);
   $router->get('/explore', ['uses' => 'DocumentsController@index']);
   $router->post('/explore/query', ['uses' => 'DocumentsController@query']);
   $router->post('/explore/get_index_types', ['uses' => 'DocumentsController@get_index_types']);
   $router->post('/explore/get_type_fields', ['uses' => 'DocumentsController@get_type_fields']);

   $router->resource('groups', 'GroupsController');
   $router->resource('users', 'UsersController');
   $router->resource('permissions', 'PermissionsController');



   $router->get('/clusters/{clusterId}/nodes', ['uses' => 'ClustersController@index']);
   $router->resource('clusters', 'ClustersController');
   $router->get('/settings', ['uses' => 'SettingsController@show']);
   $router->post('/settings', ['uses' => 'SettingsController@update']);

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
