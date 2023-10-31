<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  num, alphanum, alpha
$routes->get('/', 'Pages::index');
$routes->get('/pages/about', 'Pages::about');
$routes->get('/pages/contact', 'Pages::contact');
$routes->get('/buku', 'buku::index');
$routes->get('/buku/tambah', 'buku::tambah');
$routes->post('/buku/simpan', 'buku::simpan');
$routes->post('/buku/update/(:any)', 'buku::update/$1');
$routes->get('/buku/ubah/(:segment)', 'buku::ubah/$1');
$routes->get('/buku/hapus/(:num)', 'buku::hapus/$1');
$routes->delete('/buku/(:num)', 'buku::hapus/$1');
$routes->get('/buku/(:any)', 'buku::detail/$1');
$routes->get('/anggota', 'anggota::index');
$routes->post('/anggota', 'anggota::index');
$routes->get('/anggota/login', 'anggota::login');
$routes->post('/anggota/login', 'anggota::login');
$routes->get('/logout', 'anggota::logout');
$routes->post('/anggota/register', 'anggota::register');