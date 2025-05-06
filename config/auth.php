<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'conducteur' => [
            'driver' => 'session',
            'provider' => 'conducteurs',
        ],

        'passager' => [
            'driver' => 'session',
            'provider' => 'passagers',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'conducteurs' => [
            'driver' => 'eloquent',
            'model' => App\Models\Conducteur::class,
        ],

        'passagers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Passager::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Administrateur::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
