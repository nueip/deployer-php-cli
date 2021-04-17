<?php

/**
 * @see https://github.com/nueip/deployer-php-cli
 */
return [
    'servers' => [
        '127.0.0.1',
    ],
    'user' => [
        'local' => '',
        'remote' => '',
    ],
    'source' => '',
    'destination' => '',
    'exclude' => [
        '.git',
    ],
    'git' => [
        'enabled' => false,
        'path' => './',
        'checkout' => true,
        'branch' => 'master',
        'submodule' => false,
    ],
    'composer' => [
        'enabled' => false,
        'path' => './',
        'command' => 'composer -n install',
    ],
    'rsync' => [
        'enabled' => true,
        'params' => '-av --delete',
        'sleepSeconds' => 0,
        'timeout' => 60,
        'identityFile' => null,
    ],
    'gke' => [
        'enabled' => false,
        'projectId' => '',
        'cluster' => '',
        'region' => '',
        'docker' => [
            'name' => '',
            'tag' => date('Ymd.His'),
            'git' => [
                'url' => '',
                'branch' => '',
            ],
        ],
        'k8s' => [
            'namespace' => '',
            'deployment' => '',
            'container' => '',
        ],
    ],
    'commands' => [
        'before' => [
            '',
        ],
    ],
    'webhook' => [
        'enabled' => false,
        'provider' => 'gitlab',
        'project' => '',
        'token' => '',
    ],
    'verbose' => false,
];
