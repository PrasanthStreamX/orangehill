<?php
return [
    [
        'title' => 'Food Menu',
        'link' => '/admin/foodmenu/type',
        'icon' => 'fa-solid fa-utensils',
        'children' => [
            [
                'title' => 'Menus',
                'link' => '/admin/foodmenu/type',
                'icon' => 'fa-regular fa-circle'
            ],
            [
                'title' => 'Categories',
                'link' => '/admin/foodmenu/category',
                'icon' => 'fa-regular fa-circle'
            ],
            [
                'title' => 'Items',
                'link' => '/admin/foodmenu/item',
                'icon' => 'fa-regular fa-circle'
            ],
        ]
    ],
];