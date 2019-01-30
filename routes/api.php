<?php

Route::apiResource(
    
    'users',
    'Api\UserController',
    ['except' => ['show', 'edit', 'create']]

)->middleware('ajax');
