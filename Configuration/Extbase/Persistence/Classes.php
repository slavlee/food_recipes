<?php
return [
    \GeorgRinger\News\Domain\Model\News::class => [
        'subclasses' => [
            \Slavlee\FoodRecipes\Register\ContentRegister::NEWSTYPE_RECIPE => \Slavlee\FoodRecipes\Domain\Model\Recipe::class,
        ]
    ],
    \Slavlee\FoodRecipes\Domain\Model\Recipe::class => [
        'tableName' => 'tx_news_domain_model_news',
        'recordType' => \Slavlee\FoodRecipes\Register\ContentRegister::NEWSTYPE_RECIPE,
        'properties' => [
            'prepTime' => [
                'fieldName' => 'prep_time'
            ],
            'cookTime' => [
                'fieldName' => 'cook_time'
            ],
            'servings' => [
                'fieldName' => 'servings'
            ],
        ]
    ],
    \Slavlee\FoodRecipes\Domain\Model\FileReference::class => [
        'tableName' => 'sys_file_reference',
    ]
];
