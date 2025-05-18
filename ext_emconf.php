<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Food Recipes',
    'description' => 'TYPO3 Extension to create a food recipe database. Perfect for food blogs.',
    'category' => 'misc',
    'author' => 'Kevin Chileong Lee',
    'author_email' => 'info@slavlee.de',
    'author_company' => 'Slavlee',
    'state' => 'stable',
    'version' => '1.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
            'fluid_styled_content' => '13.4.0-13.4.99',
            'news' => '12.3.0-12.3.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Slavlee\\FoodRecipes\\' => 'Classes'
        ]
    ],
];
