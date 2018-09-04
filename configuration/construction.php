<?php

return [
    'Storage' => [
        'class' => 'arhone\storing\ContainerFileSystemAdapter',
        'construction' => [
            [
                'directory' => __DIR__ . '/../../../storage'
            ]
        ]
    ],
    'Registry' => [
        'class' => 'arhone\storing\ContainerMemoryAdapter'
    ],
    'Configuration' => [
        'class' => 'arhone\storing\ContainerMemoryAdapter'
    ]
];