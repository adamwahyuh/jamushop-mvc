<?php

require_once __DIR__ . '/../../../router.php';
require_once __DIR__ . '/../../../controller/KeranjangController.php';

get('/api/v1/keranjang', function () {
    KeranjangController::index();
});

get('/api/v1/keranjang/$id', function ($id) {
    KeranjangController::find($id);
});

post('/api/v1/keranjang', function () {
    KeranjangController::create();
});

put('/api/v1/keranjang/$id', function ($id) {
    KeranjangController::update($id);
});

delete('/api/v1/keranjang/$id', function ($id) {
    KeranjangController::destroy($id);
});
