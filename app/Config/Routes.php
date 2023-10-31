<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  num, alphanum, alpha
$routes->get('/', 'Pages::index', ['filter' => 'auth']);
$routes->get('/pages/about', 'Pages::about', ['filter' => 'auth']);
$routes->get('/pages/contact', 'Pages::contact', ['filter' => 'auth']);
$routes->get('/buku', 'buku::index', ['filter' => 'auth']);
$routes->get('/buku/tambah', 'buku::tambah', ['filter' => 'auth']);
$routes->post('/buku/simpan', 'buku::simpan');
$routes->post('/buku/update/(:any)', 'buku::update/$1', ['filter' => 'auth']);
$routes->get('/buku/ubah/(:segment)', 'buku::ubah/$1', ['filter' => 'auth']);
$routes->get('/buku/hapus/(:num)', 'buku::hapus/$1', ['filter' => 'auth']);
$routes->delete('/buku/(:num)', 'buku::hapus/$1', ['filter' => 'auth']);
$routes->get('/buku/(:any)', 'buku::detail/$1', ['filter' => 'auth']);
$routes->get('/anggota', 'anggota::index', ['filter' => 'auth']);
$routes->post('/anggota', 'anggota::index', ['filter' => 'auth']);
$routes->get('/anggota/login', 'anggota::login');
$routes->post('/anggota/auth', 'anggota::auth');
$routes->get('/logout', 'anggota::logout');
$routes->post('/anggota/register', 'anggota::register');