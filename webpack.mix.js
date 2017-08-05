const mix = require('laravel-mix');



mix.babel(
    [
    'resources/admin/mantenimiento/users_ajax.js',
    'resources/admin/mantenimiento/users.js'
    ],
    'public/admin/mantenimiento/user/app.js'
).version();

/*
mix.babel(
    [
    'resources/admin/mantenimiento/users_ajax.js',
    'resources/admin/mantenimiento/users.js'
    ],
    'public/admin/mantenimiento/user/app.js'
).version();



mix.babel(
    [
    'resources/admin/mantenimiento/users_ajax.js',
    'resources/admin/mantenimiento/users.js'
    ],
    'public/admin/mantenimiento/user/app.js'
).version();



mix.babel(
    [
    'resources/admin/mantenimiento/users_ajax.js',
    'resources/admin/mantenimiento/users.js'
    ],
    'public/admin/mantenimiento/user/app.js'
).version();
*/