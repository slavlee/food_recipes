<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\Bootstrap\TCA;

use Slavlee\FoodRecipes\Bootstrap\AbstractBootstrap;
use Slavlee\FoodRecipes\Bootstrap\Traits\TcaTrait;

/*
 * This file is part of the TYPO3 extension food_recipes.
 *
 * Init all necessary processes to register t3t container elements
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

class ToolBootstrap extends AbstractBootstrap
{
    use TcaTrait;

    /**
     * Run the class
     */
    public function invoke(): void
    {
        $this->dbTable = 'tx_foodrecipes_domain_model_tool';
    }

    public function getTca(): array
    {
        $newProperties = [
            'ctrl' => [
                'title' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_tool'),
                'label' => 'name',
                'tstamp' => 'tstamp',
                'crdate' => 'crdate',
                'delete' => 'deleted',
                'sortby' => 'sorting',
                'default_sortby' => 'name',
                'versioningWS' => true,
                'iconfile' => $this->getIconPath('tool.svg'),
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
                ]
            ],
            'types' => [
                0 => [
                    'showitem' => 'name, description, is_optional, image, alternatives, affiliate'
                ],
            ],
            'columns' => [
                'name' => $this->getInputTCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_tool.name'),
                    30,
                    true
                ),
                'description' => $this->getRTETCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_tool.description')
                ),
                'is_optional' => $this->getCheckTCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_tool.is_optional'),
                    false
                ),
                'image' => $this->getImageTCADef(
                    false,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_tool.image'),
                    0,
                    1
                ),
                'alternatives' => $this->getTextareaCADef(
                    false,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_tool.alternatives'),
                    false,
                    [
                        'description' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_tool.alternatives.description'),
                    ]
                ),
                'affiliate' => $this->getGroupTCADef(
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_affiliate'),
                    'tx_foodrecipes_domain_model_affiliate',
                    'manyToOne',
                    0,
                    1,
                    false,
                    [
                        'config' => [
                            'maxitems' => 1,
                        ]
                    ]
                ),
            ],
        ];

        return $newProperties;
    }
}
