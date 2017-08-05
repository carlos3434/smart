const mix = require('laravel-mix');



mix.babel(
    [
    'resources/admin/mantenimiento/user_ajax.js',
    'resources/admin/mantenimiento/users.js'
    ],
    'public/admin/mantenimiento/user/app.js'
).version();


mix.babel(
    [
    'resources/admin/mantenimiento/roles_ajax.js',
    'resources/admin/mantenimiento/roles.js'
    ],
    'public/admin/mantenimiento/roles/app.js'
).version();



mix.babel(
    [
    'resources/admin/mantenimiento/modulos_ajax.js',
    'resources/admin/mantenimiento/modulos.js'
    ],
    'public/admin/mantenimiento/modulos/app.js'
).version();



mix.babel(
    [
    'resources/admin/mantenimiento/submodulos_ajax.js',
    'resources/admin/mantenimiento/submodulos.js'
    ],
    'public/admin/mantenimiento/submodulos/app.js'
).version();


mix.babel(
    [
    'resources/admin/inventario/bandeja_ajax.js',
    'resources/admin/inventario/bandeja.js'
    ],
    'public/admin/inventario/bandeja/app.js'
).version();


mix.babel(
    [
    'resources/admin/bandeja/registro_ajax.js',
    'resources/admin/bandeja/registro.js'
    ],
    'public/admin/bandeja/registro/app.js'
).version();
