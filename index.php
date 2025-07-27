<?php 

require_once "router.php";
require_once "models/Bahan.php";
require_once "models/Keranjang.php";


/*
 * ================================
 *  Fetch API Using JS :) And DOM
 *  Take a look at asset/js/
 *  ================================
 *  Config file is in config.json
 *  Set your Running Server in config.json
 *  ================================
 */


get('/', function(){
    $totalKeranjang = count(Keranjang::get()) ;
    $title = '';
    $namaToko = 'Jamu Mbah Jawa'; 
    return include 'views/home.php';
});

get('/cangkir', function(){
    $totalKeranjang = count(Keranjang::get()) ; 
    $title = 'Cangkir';
    $namaToko = 'Jamu Mbah Jawa';
    return include 'views/keranjang.php';
});
get('/docs', "views/docsapi");

if (empty($GLOBALS['route_matched'])) {
    include __DIR__ . '/views/404.php';
}

// get('/bahan', function (){
//     $bahanBahan = Bahan::get();
//     return include 'views/listing-bahan.php';
// });

// get('/bahan/$id', function ($id){
//     $bahan = Bahan::find($id);
//     if (!$bahan){
//         return route('/404', 'views/404');
//     }
//     return include 'views/show-bahan.php';
// });
