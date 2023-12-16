<?php
return [
    'roles' => [
        'super_user' => [
            'name'      => 'super_user',
            'sub_roles' => ['admin', 'staff'],
        ],
        'admin'      => [
            'name'      => 'admin',
            'sub_roles' => ['staff'],
        ],
        'staff' => [
            'name' => 'staff',
            'sub_roles' => []
        ]
    ],
];
