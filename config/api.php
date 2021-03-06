<?php

return [
    'Api' => [
        'ServiceFallback' => '\\CakeDC\\Api\\Service\\FallbackService',
        'renderer' => 'CakeDC/Api.JSend',
        'parser' => 'CakeDC/Api.Form',

        'useVersioning' => false,
        'versionPrefix' => 'v',

        'Auth' => [
            'Crud' => [
                 'default' => 'allow'
            ],
        ],

        'Service' => [
            'blog2' => [
                'options' => [
                    'className' => \External\Service\BlogsService::class,
                    'table' => 'Blogs',
                ],
            ],
            'default' => [
                'options' => [],
                'Action' => [
                    'default' => [
                        //default actions options
                        'Auth' => [
							'allow' => '*',
                            'authorize' => [
                                'CakeDC/Api.Crud' => []
                            ],
                            'authenticate' => [
                                'CakeDC/Api.Token' => [
                                    'require_ssl' => false,
                                ]
                            ],
                        ],
                        'Extension' => [
                            'CakeDC/Api.Cors',
                            'CakeDC/Api.Filter',
                            'CakeDC/Api.Sort',
                            // default extensions for all services
                        ]
                    ],
                    'ActionName' => [
                        //action options
                    ],
                    'View' => [
                        //action options
                        'Extension' => [
                            'CakeDC/Api.CrudHateoas',
                        ],
                    ],
                    'Index' => [
                        //action options
                        'Extension' => [
                            'CakeDC/Api.CrudRelations',
                            'CakeDC/Api.CrudAutocompleteList',
                            'CakeDC/Api.Paginate',
                        ],
                    ],
                ],
            ],
        ],
    ]
];
