<?php


Route::apiResource('users', 'Api\UserController', ['except' => ['show', 'edit', 'create']]);
Route::apiResource('roles', 'Api\RoleController', ['except' => ['edit', 'create']]);
