<?php

/**
 * @see https://github.com/nueip/deployer-php-cli
 */
return [
    // This project config processes deployment only for simple usage
    'default' => [
        'servers' => [
            '127.0.0.1',
        ],
        'source' => '/home/user/project',
        'destination' => '/var/www/html/prod/',
    ],
    // This project config processes Git and Composer before deployment
    'advanced' => [
        'servers' => [
            '127.0.0.1',
        ],
        'user' => [
            'local' => '',
            'remote' => '',
        ],
        'source' => '/home/user/project-advanced',
        'destination' => '/var/www/html/prod/',
        'exclude' => [
            '.git',
            'tmp/*',
        ],
        'git' => [
            'enabled' => true,
            'path' => './',
            'checkout' => true,
            'branch' => 'master',
            'submodule' => false,
        ],
        'composer' => [
            'enabled' => true,
            'path' => './',
            // 'path' => ['./', './application/'],
            'command' => 'composer -n install',
        ],
        'test' => [
            'enabled' => false,
            'name' => 'PHPUnit',
            'type' => 'phpunit',
            // CodeIgniter 3 for example (https://github.com/nueip/codeigniter-phpunit)
            'command' => './application/vendor/bin/phpunit',
            'configuration' => './application/phpunit.xml',
        ],
        'rsync' => [
            'enabled' => true,
            'params' => '-av --delete',
            // 'sleepSeconds' => 0,
            // 'timeout' => 60,
            // 'identityFile' => '/home/deployer/.ssh/id_rsa',
        ],
        'commands' => [
            'before' => [
                '',
            ],
        ],
        'webhook' => [
            'enabled' => false,
            'provider' => 'gitlab',
            'project' => 'nueip/deployer-php-cli',
            'token' => 'thisistoken',
        ],
        'verbose' => false,
    ],
    // This project config processes deploy to GKE
    'deployToGKE' => [
        'git' => [
            'enabled' => false,
        ],
        'rsync' => [
            'enabled' => false,
        ],
        'gke' => [
            'enabled' => true,
            'projectId' => 'gcp-deploy',
            'cluster' => 'gke-cluster',
            'region' => 'asia-east1',
            'docker' => [
                'name' => 'backend-docker',
                'tag' => date('Ymd.His'),
                'git' => [
                    'url' => 'https://<username>:<deploy_token>@gitlab.com/tanuki/awesome_project.git',
                    'branch' => 'release',
                ],
            ],
            'k8s' => [
                'namespace' => 'default',
                'deployment' => 'backend-deploy',
                'container' => 'backend-app',
            ],
        ],
    ],
];
