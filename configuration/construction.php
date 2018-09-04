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
    'Config' => [
        'class' => 'arhone\storing\StorageMemoryAdapter'
    ]
];