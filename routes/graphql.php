<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->post('/graphql', function () {
    return app('graphql')->executeQuery(request()->input('query'), request()->all());
});
