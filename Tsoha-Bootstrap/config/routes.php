<?php

$routes->get('/', function() {
    View::make('index.html');
});

function check_logged_in() {
    BaseController::check_logged_in();
}

$routes->get('/race', function() {
    RaceController::index();
});
$routes->post('/race', 'check_logged_in', function() {
    RaceController::store();
});
$routes->get('/race/new', 'check_logged_in', function() {
    RaceController::create();
});
$routes->get('/race/:id', 'check_logged_in', function($id) {
    RaceController::find($id);
});
$routes->get('/race/:id/edit', 'check_logged_in', function($id) {
    RaceController::edit($id);
});
$routes->post('/race/:id/edit', 'check_logged_in', function($id) {
    RaceController::update($id);
});
$routes->post('/race/:id/destroy', 'check_logged_in', function($id) {
    RaceController::destroy($id);
});

$routes->get('/user', function() {
    UserController::index();   
});

$routes->get('/login', function() {
    UserController::login();
});
$routes->post('/login', function() {
    UserController::handle_login();
});
$routes->get('/', 'check_logged_in', function() {
    UserController::index();
});
$routes->post('/:id/logout', function() {
    UserController::logout();
});
$routes->get('/racegroup', function() {
    RacegroupController::index();
});
$routes->post('/racegroup', 'check_logged_in', function() {
    RacegroupController::store();
});
$routes->get('/racegroup/new', 'check_logged_in', function() {
    RacegroupController::create();
});
$routes->get('/racegroup/:id', 'check_logged_in', function($id) {
    RacegroupController::find($id);
});
$routes->get('/racegroup/:id/edit', 'check_logged_in', function($id) {
    RacegroupController::edit($id);
});
$routes->post('/racegroup/:id/edit', 'check_logged_in', function($id) {
    RacegroupController::update($id);
});
$routes->post('/racegroup/:id/destroy', 'check_logged_in', function($id) {
    RacegroupController::destroy($id);
});

$routes->post('/user', function() {
    UserController::store();
});

$routes->get('/user/new', function() {
    UserController::create();
});

$routes->get('/user/:id', function($id) {
    UserController::show($id);
});

$routes->post('/user/:id/edit', function() {
    RaceController::update();
});

$routes->post('/logout', function() {
    UserController::logout();
});

$routes->post('/user/:id/destroy', function($id) {
    UserController::destroy($id);
});

$routes->get('/race', function() {
    RaceController::index();
});

$routes->post('/race', 'check_logged_in', function() {
    RaceController::store();
});

$routes->post('/race/:id/edit', 'check_logged_in', function() {
    RaceController::update();
});

$routes->get('/race/new', 'check_logged_in', function() {
    RaceController::create();
});

$routes->post('/race/:id/destroy', 'check_logged_in', function($id) {
    RaceController::destroy($id);
});

$routes->get('/race/:id', function($id) {
    RaceController::search();
});

$routes->get('/race/:id', 'check_logged_in', function($id) {
    // Rodun muokkauslomakkeen esittäminen
    RaceController::show($id);
});

$routes->get('/race/:id/edit', 'check_logged_in', function($id) {
    // Rodun muokkauslomakkeen esittäminen
    RaceController::edit($id);
});

$routes->post('/race/edit', 'check_logged_in', function($id) {
    // Rodun muokkaaminen
    RaceController::update($id);
});

$routes->get('/user', function() {
    UserController::index();
});

$routes->post('/user/:id/edit', function() {
    UserController::update();
});

$routes->get('/login', function() {
    UserController::login();
});
$routes->post('/login', function() {
    UserController::handle_login();
});
$routes->get('/', 'check_logged_in', function() {
    RaceController::index();
});
$routes->post('/logout', function() {
    UserController::logout();
});

$routes->get('/racegroup/:id', function($id) {
    RacegroupController::show($id);
});

$routes->post('/racegroup', function() {
    RacegroupController::store();
});

$routes->get('/race/new', function() {
    RaceController::create();
});

$routes->post('/race/:id/destroy', function($id) {
    RaceController::destroy($id);
});
//
//  $routes->get('/race', 'check_logged_in', function(){
//  RaceController::index();
//  });
//
//
//  $routes->get('/race/:id', 'check_logged_in', function($id){
//  RaceController::show($id);
//  });


$routes->get('/racegroup/index', function() {
    RacegroupController::index();
});

$routes->post('/racegroup', function() {
    RacegroupController::store();
});

$routes->post('/racegroup/:id/edit', function() {
    RacegroupController::update();
});

$routes->get('/racegroup/new', function() {
    RacegroupController::create();
});

//$routes->get('/race/:id', function() {
//    RaceController::search();
//});

$routes->get('/racegroup/:id', function($id) {
    // Rodun muokkauslomakkeen esittäminen
    RaceGroupController::show($id);
});

$routes->get('/racegroup/:id/edit', function($id) {
    // Rodun muokkauslomakkeen esittäminen
    RacegroupController::edit($id);
});

$routes->post('/racegroup/edit', function($id) {
    // Rodun muokkaaminen
    RacegroupController::update($id);
});

$routes->get('/racegroup/:id', function($id) {
    RacegroupController::show($id);
});

$routes->post('/racegroup', function() {
    RacegroupController::store();
});