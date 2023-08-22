<?php

namespace App\Main;

class TopMenu
{
    /**
     * List of top menu items.
     */
    public static function menu(): array
    {
        return [
            'profile' => [
                'icon' => 'users',
                'route_name' => 'profile.index',
                'params' => [
                    'layout' => 'top-menu'
                ],
                'title' => 'Profile'
            ],
            'show' => [
                'icon' => 'cast',
                'route_name' => 'profile.show',
                'params' => [
                    'layout' => 'top-menu'
                ],
                'title' => 'Display'
            ],
            'qr' => [
                'icon' => 'camera',
                'route_name' => 'qr.index',
                'params' => [
                    'layout' => 'top-menu'
                ],
                'title' => 'QR'
            ]
        ];
    }
}
