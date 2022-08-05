<?php

return [
    'sidebar_menu' => [
        [
            'menu_category' => 'Application information',
            'main_menu' => [
                [
                    'name' => 'App info',
                    'hint' => 'App info',
                    'icon' => 'fa fa-info',
                    'has_menu' => true,
                    'route' => '#',
                    'sub_menu' => [
                        [
                            'name' => 'Application',
                            'hint' => 'Application',
                            'icon' => 'fa fa-arrow',
                            'route' => 'appinfo.index',
                            'sub_menu' => [],
                            'has_menu' => false,
                        ],
                        [
                            'name' => 'System status',
                            'hint' => 'System status',
                            'icon' => 'fa fa-arrow',
                            'route' => 'appinfo.status',
                            'sub_menu' => [],
                            'has_menu' => false,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'middleware_auth' => ['auth'],
];
