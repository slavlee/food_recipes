<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\Bootstrap\TCA;

use Slavlee\FoodRecipes\Bootstrap\AbstractBootstrap;
use Slavlee\FoodRecipes\Bootstrap\Traits\TcaTrait;
use Slavlee\FoodRecipes\Register\ContentRegister;
use Slavlee\FoodRecipes\Register\RecipeRegister;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * Init all necessary processes to register t3t container elements
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

class NewsBootstrap extends AbstractBootstrap
{
    use TcaTrait;

    /**
     * Run the class
     */
    public function invoke(): void
    {
        $this->dbTable = 'tx_news_domain_model_news';
        $this->registerRecipeType();
        $this->addProperties();
    }

    /**
     * Register new News record type recipe
     */
    private function registerRecipeType(): void
    {
        ExtensionManagementUtility::addFieldsToPalette(
            $this->dbTable,
            RecipeRegister::PALETTE_RECIPE,
            'servings,--linebreak--,prep_time,cook_time,--linebreak--,ingredients,--linebreak--,tools'
        );

        ExtensionManagementUtility::addFieldsToPalette(
            $this->dbTable,
            RecipeRegister::PALETTE_RECIPESTEPS,
            'steps'
        );

        $GLOBALS['TCA'][$this->dbTable]['palettes'][RecipeRegister::PALETTE_RECIPE]['label'] = $this->getLLL('locallang_tca.xlf:palette.recipe');
        $GLOBALS['TCA'][$this->dbTable]['palettes'][RecipeRegister::PALETTE_RECIPESTEPS]['label'] = $this->getLLL('locallang_tca.xlf:palette.recipe_steps');

        // Register news type
        $GLOBALS['TCA'][$this->dbTable]['columns']['type']['config']['items'][ContentRegister::NEWSTYPE_RECIPE] =
            [$this->getLLL('locallang_news.xlf:recordtype.recipe'), ContentRegister::NEWSTYPE_RECIPE];

        // Inherit config from News Default
        $GLOBALS['TCA'][$this->dbTable]['types'][ContentRegister::NEWSTYPE_RECIPE]['showitem'] =
            '--palette--;;paletteCore,title,--palette--;;paletteSlug,teaser, --palette--;;paletteDate, bodytext, --div--;LLL:EXT:food_recipes/Resources/Private/Language/locallang_db.xlf:tx_foodrecipes_domain_model_recipe.recipe, --palette--;;recipe,--palette--;;recipe_steps,affiliates, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media, fal_media,fal_related_files, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories, categories, --div--;LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:tx_news_domain_model_news.tabs.relations, related,related_from, related_links,tags, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.metadata, --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.editorial;paletteAuthor, --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.metatags;metatags, --palette--;LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:tx_news_domain_model_news.palettes.alternativeTitles;alternativeTitles, --palette--;;sitemap, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, --palette--;;paletteLanguage, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, --palette--;;paletteHidden, --palette--;;paletteAccess, --div--;LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:notes, notes, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.extended';
    }

    private function addProperties(): void
    {
        $newProperties = [
            'servings' => $this->getNumberTCADef(
                true,
                $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_recipe.servings'),
                30,
                [
                    'config' => [
                        'format' => 'integer',
                        'required' => true,
                    ],
                ]
            ),
            'prep_time' => $this->getNumberTCADef(
                true,
                $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_recipe.prep_time'),
                30,
                [
                    'description' => $this->getLLL('locallang_tca.xlf:misc.time_in_minutes'),
                    'config' => [
                        'format' => 'decimal',
                        'required' => true,
                    ],
                ]
            ),
            'cook_time' => $this->getNumberTCADef(
                true,
                $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_recipe.cook_time'),
                30,
                [
                    'description' => $this->getLLL('locallang_tca.xlf:misc.time_in_minutes'),
                    'config' => [
                        'format' => 'decimal',
                        'required' => true,
                    ],
                ]
            ),
            'ingredients' => $this->getInlineTCADef(
                $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_recipe.ingredients'),
                'tx_foodrecipes_domain_model_ingredient',
                'recipe',
                $this->dbTable,
                true,
                [
                    'config' => [
                        'minitems' => 1,
                        'maxitems' => 99,
                        'appearance' => [
                            'collapseAll' => true,
                        ],
                    ]
                ]
            ),

            'tools' => $this->getSelectTCADef(
                $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_recipe.tools'),
                'selectMultipleSideBySide',
                false,
                false,
                [
                    'config' => [
                        'foreign_table' => 'tx_foodrecipes_domain_model_tool',
                        'foreign_table_where' => ' AND {#tx_foodrecipes_domain_model_tool}.{#sys_language_uid} IN (0,-1)',
                        'size' => 5,
                        'autoSizeMax' => 10,
                        'multiple' => true,
                        'behaviour' => [
                            'allowLanguageSynchronization' => 0,
                        ],
                    ],
                    'l10n_mode' => 'exclude',
                    'l10n_display' => 'defaultAsReadonly',
                ]
            ),
            'steps' => $this->getInlineTCADef(
                $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_recipe.steps'),
                'tx_foodrecipes_domain_model_step',
                'recipe',
                $this->dbTable,
                true,
                [
                    'description' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_recipe.steps.description'),
                    'config' => [
                        'minitems' => 0,
                        'maxitems' => 99,
                        'foreign_default_sortby' => 'number',
                        'appearance' => [
                            'expandSingle' => true,
                        ],
                    ]
                ]
            ),
            'affiliates' => $this->getSelectTCADef(
                $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_recipe.affiliates'),
                'selectMultipleSideBySide',
                false,
                false,
                [
                    'config' => [
                        'foreign_table' => 'tx_foodrecipes_domain_model_affiliate',
                        'foreign_table_where' => ' AND {#tx_foodrecipes_domain_model_affiliate}.{#sys_language_uid} IN (0,-1)',
                        'size' => 5,
                        'autoSizeMax' => 10,
                        'multiple' => true,
                    ],
                    'l10n_mode' => 'exclude',
                    'l10n_display' => 'defaultAsReadonly',
                ]
            )
        ];

        ExtensionManagementUtility::addTCAcolumns(
            $this->dbTable,
            $newProperties
        );
    }
}
