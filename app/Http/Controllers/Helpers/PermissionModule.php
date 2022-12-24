<?php

namespace App\Http\Controllers\Helpers;

use App\Models\Setting;
use App\Models\Slider;
use App\Models\Social;


class PermissionModule
{
    public static function modules(): array
    {
        return [
            [
                'name' => 'slider',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'social',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'contact',
                'permissions' => [
                    'create',
                    'edit',
                ]
            ],
            [
                'name' => 'setting',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'profile',
                'permissions' => [
                    'edit',
                ]
            ],
            [
                'name' => 'about',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'category',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'post',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'skill or technology',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'tag',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'trusted company',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'we do care',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'we offer',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'why choose',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'contact message',
                'permissions' => [
                    'show',
                    'delete',
                    'reply',
                    'reply delete',
                    'reply show',
                ]
            ],
            [
                'name' => 'our mission',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'user expectation',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'work road map',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'service',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'career',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ],
            [
                'name' => 'subscriber',
                'permissions' => [
                    'delete',
                    'show'
                ]
            ],
        ];
    }
}
