<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\Bootstrap\TCA;

use Slavlee\FoodRecipes\Bootstrap\AbstractBootstrap;
use Slavlee\FoodRecipes\Bootstrap\Traits\TcaTrait;
use Slavlee\FoodRecipes\Register\RecipeRegister;
use Slavlee\FoodRecipes\Register\ContentRegister;

/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * Init all necessary processes to register t3t container elements
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

class IngredientBootstrap extends AbstractBootstrap
{
    use TcaTrait;

    /**
     * Run the class
     */
    public function invoke(): void
    {
        $this->dbTable = 'tx_foodrecipes_domain_model_ingredient';
    }

    public function getTca(): array
    {
        $newProperties = [
            'ctrl' => [
                'title' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient'),
                'label' => 'name',
                'tstamp' => 'tstamp',
                'crdate' => 'crdate',
                'delete' => 'deleted',
                'sortby' => 'sorting',
                'default_sortby' => 'name',
                'versioningWS' => true,
                'iconfile' => $this->getIconPath('ingredient.svg'),
                'languageField' => 'sys_language_uid',
                'transOrigPointerField' => 'l10n_parent',
                'transOrigDiffSourceField' => 'l10n_diffsource',
                'translationSource' => 'l10n_source',
                'searchFields' => 'name',
                'enablecolumns' => [
                    'disabled' => 'hidden',
                ],
                'security' => [
                    'ignorePageTypeRestriction' => true,
                ],
                'hideTable' => true
            ],
            'types' => [
                0 => [
                    'showitem' => 'name, quantity, unit, is_main, is_optional, recipe_as_ingredient'
                ],
            ],
            'columns' => [
                'name' => $this->getInputTCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.name'),
                    30,
                    true
                ),
                'quantity' => $this->getNumberTCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.quantity'),
                    30,
                    [
                        'format' => 'decimal',
                        'config' => [
                            'required' => true,
                        ],
                    ]
                ),
                'unit' => $this->getSelectTCADef(
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.unit'),
                    'selectSingle',
                    true,
                    true,
                    [
                        'config' => [
                            'items' => [
                                [
                                    'label' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.unit.I.grams'),
                                    'value' => RecipeRegister::UNIT_GRAMS
                                ],
                                [
                                    'label' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.unit.I.cups'),
                                    'value' => RecipeRegister::UNIT_CUPS
                                ],
                                [
                                    'label' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.unit.I.tablespoons'),
                                    'value' => RecipeRegister::UNIT_TABLESPOONS
                                ],
                                [
                                    'label' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.unit.I.teaspoons'),
                                    'value' => RecipeRegister::UNIT_TEASPOONS
                                ],
                                [
                                    'label' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.unit.I.pieces'),
                                    'value' => RecipeRegister::UNIT_PIECES
                                ],
                                [
                                    'label' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.unit.I.milliliter'),
                                    'value' => RecipeRegister::UNIT_ML
                                ],
                            ],
                        ],
                    ],
                ),
                'is_main' => $this->getCheckTCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.is_main'),
                    false
                ),
                'is_optional' => $this->getCheckTCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.is_optional'),
                    false
                ),
                'recipe_as_ingredient' => $this->getGroupTCADef(
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.recipe'),
                    'tx_news_domain_model_news',
                    'manyToOne',
                    0,
                    1,
                    false,
                    [
                        'description' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient.recipe.description'),
                        'config' => [
                            'maxitems' => 1,
                            'suggestOptions' => [
                                'default' => [
                                    'additionalSearchFields' => 'teaser,bodytext',
                                    'addWhere' => 'AND tx_news_domain_model_news.type = ' . ContentRegister::NEWSTYPE_RECIPE,
                                ],
                            ],
                        ]
                    ]
                ),
            ],
        ];

        return $newProperties;
    }
}
