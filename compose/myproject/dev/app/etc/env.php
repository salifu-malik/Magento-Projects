<?php
return [
    'backend' => [
        'frontName' => 'admin_fa0kaq1'
    ],
    'remote_storage' => [
        'driver' => 'file'
    ],
    'cache' => [
        'graphql' => [
            'id_salt' => 'yA0ZYQvt6nG8gybuKDBrVNY3QdnPDtni'
        ],
        'frontend' => [
            'default' => [
                'id_prefix' => '69d_',
                'backend_options' => [
                    'serializer' => 'igbinary'
                ]
            ],
            'page_cache' => [
                'id_prefix' => '69d_',
                'backend_options' => [
                    'serializer' => 'igbinary'
                ]
            ]
        ]
    ],
    'config' => [
        'async' => 0
    ],
    'queue' => [
        'consumers_wait_for_messages' => 1
    ],
    'crypt' => [
        'key' => 'base64xKx3iSkIll5cyOeAMx0932zY8fcJVvVfDPYP6Tp1gZY='
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'compose_db_1',
                'dbname' => 'magento',
                'username' => 'magento',
                'password' => 'magento',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'active' => '1',
                'driver_options' => [
                    1014 => false
                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'default',
    'session' => [
        'save' => 'files'
    ],
    'lock' => [
        'provider' => 'db'
    ],
    'directories' => [
        'document_root_is_pub' => true
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'graphql_query_resolver_result' => 1,
        'full_page' => 0,
        'config_webservice' => 1,
        'translate' => 1
    ],
    'downloadable_domains' => [
        'localhost'
    ],
    'install' => [
        'date' => 'Sat, 16 May 2026 17:29:47 +0000'
    ]
];
