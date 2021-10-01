<?php

use Cake\Core\Configure;

$permissions = [
    [
        'role' => '*',
        'service' => '*',
        'action' => '*',
        'method' => '*',
        'bypassAuth' => true,
    ],
];

return [
    'CakeDC/Auth.api_permissions' => $permissions
];
