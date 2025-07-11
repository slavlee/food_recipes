<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\Bootstrap\TCA;

use Slavlee\FoodRecipes\Bootstrap\AbstractBootstrap;
use Slavlee\FoodRecipes\Bootstrap\Traits\TcaTrait;
use Slavlee\FoodRecipes\UserFunctions\FormEngine\SelectSingleBoxStepIngredients;
use Slavlee\FoodRecipes\UserFunctions\FormEngine\SelectSingleBoxStepTools;

/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * Init all necessary processes to register t3t container elements
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

class StepBootstrap extends AbstractBootstrap
{
    use TcaTrait;

    /**
     * Run the class
     */
    public function invoke(): void
    {
        $this->dbTable = 'tx_foodrecipes_domain_model_step';
    }

    public function getTca(): array
    {
        $newProperties = [
            'ctrl' => [
                'title' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_ingredient'),
                'label' => 'description',
                'tstamp' => 'tstamp',
                'crdate' => 'crdate',
                'delete' => 'deleted',
                'sortby' => 'sorting',
                'default_sortby' => 'sorting',
                'versioningWS' => true,
                'iconfile' => $this->getIconPath('step.svg'),
                'languageField' => 'sys_language_uid',
                'transOrigPointerField' => 'l10n_parent',
                'transOrigDiffSourceField' => 'l10n_diffsource',
                'translationSource' => 'l10n_source',
                'searchFields' => 'name,description',
                'enablecolumns' => [
                    'disabled' => 'hidden',
                ],
                'security' => [
                    'ignorePageTypeRestriction' => true,
                ],
                'hideTable' => true,
            ],
            'types' => [
                0 => [
                    'showitem' => 'description,--linebreak--,ingredients,tools,--linebreak--,media,--linebreak--,group'
                ],
            ],
            'columns' => [
                'description' => $this->getRTETCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_step.description'),
                ),
                'ingredients' => $this->getSelectTCADef(
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_step.ingredients'),
                    'selectSingleBox',
                    true,
                    false,
                    [
                        'config' => [
                            'itemsProcFunc' => SelectSingleBoxStepIngredients::class . '->itemsProcFunc'
                        ],
                    ]
                ),
                'tools' => $this->getSelectTCADef(
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_step.tools'),
                    'selectSingleBox',
                    true,
                    false,
                    [
                        'config' => [
                            'itemsProcFunc' => SelectSingleBoxStepTools::class . '->itemsProcFunc'
                        ],
                    ]
                ),
                'media' => $this->getMediaTCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_step.media'),
                    0,
                    99
                ),
                'group' => $this->getInputTCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_step.group'),
                )
            ]
        ];

        return $newProperties;
    }
}
