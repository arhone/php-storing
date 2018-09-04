<?php

return [
    'Storage' => [
        'class' => 'arhone\storing\StorageFileSystemAdapter',
        'construct' => [
            'directory' => __DIR__ . '/../../../storage'
        ]
    ],
    'Registry' => [
        'class' => 'arhone\storing\StorageMemoryAdapter'
    ],
    'Configuration' => [
        'class' => 'arhone\storing\StorageMemoryAdapter'
    ]
];