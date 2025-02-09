<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth.jwt'])->post('/graphql', function () {
    return app('graphql')->executeQuery(request()->input('query'), request()->all());
});
