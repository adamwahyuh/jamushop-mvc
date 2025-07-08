<?php

require_once __DIR__ . '/../../../router.php';
require_once __DIR__ . '/../../../controller/RacikanController.php';

get('/api/v1/racikan', function () {
    RacikanController::index();
});

get('/api/v1/racikan/$id', function ($id) {
    RacikanController::find($id);
});

post('/api/v1/racikan', function () {
    RacikanController::create();
});

put('/api/v1/racikan/$id', function ($id) {
    RacikanController::update($id);
});

delete('/api/v1/racikan/$id', function ($id) {
    RacikanController::destroy($id);
});
