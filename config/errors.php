<?php

return [
    'characters' => [
        'empty' => [
            'message' => 'no hay characters registrados',
            'code' => 200,
        ],
        'validation_fails' => [
            'message' => 'Error en la validacion de datos',
            'code' => 400,
        ],
        'store_error' => [
            'message' => 'Error al crear el character',
            'code' => 500,
        ],
        'not_found' => [
            'message' => 'Character no encontrado',
            'code' => 404,
        ],
        'destroy_success' => [
            'message' => 'Character eliminado',
            'code' => 200,
        ],
        'update_success' => [
            'message' => 'Character actualizado',
            'code' => 201,
        ],
    ],
];