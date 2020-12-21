<?php

return [
    'role_structure' => [
        'superAdmin' => [
            'user' => 'c,r,u,d',
            'hospital' => 'c,r,u,d',
            'department' => 'c,r,u,d',
            'doctor' => 'c,r,u,d',
            'patient' => 'c,r,u,d',
            'medicalFile' => 'c,r,u,d',
            'ticket' => 'c,r,u,d',
        ],
        'admin' => [
            'user' => 'c,r,u',
            'hospital' => 'c,r,u',
            'department' => 'c,r,u',
            'doctor' => 'c,r,u',
            'patient' => 'c,r,u',
            'medicalFile' => 'r,u',
            'ticket' => 'c,r,u',
        ],
        'employee' => [
            'department' => 'r',
            'doctor' => 'r',
            'patient' => 'c,r,u',
            'ticket' => 'c,r,u',
        ],

    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
