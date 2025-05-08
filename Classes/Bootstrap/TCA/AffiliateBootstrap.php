<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\Bootstrap\TCA;

use Slavlee\FoodRecipes\Bootstrap\AbstractBootstrap;
use Slavlee\FoodRecipes\Bootstrap\Traits\TcaTrait;
use Slavlee\FoodRecipes\UserFunctions\FormEngine\SelectSingleBoxStepIngredients;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * Init all necessary processes to register t3t container elements
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

class AffiliateBootstrap extends AbstractBootstrap
{
    use TcaTrait;

    /**
     * Run the class
     */
    public function invoke(): void
    {
        $this->dbTable = 'tx_foodrecipes_domain_model_affiliate';
    }

    public function getTca(): array
    {
        $newProperties = [
            'ctrl' => [
                'title' => $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_affiliate'),
                'label' => 'name',
                'tstamp' => 'tstamp',
                'crdate' => 'crdate',
                'delete' => 'deleted',
                'sortby' => 'sorting',
                'default_sortby' => 'name',
                'versioningWS' => true,
                'iconfile' => $this->getIconPath('affiliate.svg'),
                'languageField' => 'sys_language_uid',
                'transOrigPointerField' => 'l10n_parent',
                'transOrigDiffSourceField' => 'l10n_diffsource',
                'translationSource' => 'l10n_source',
                'searchFields' => 'name,description,link_label,link',
                'enablecolumns' => [
                    'disabled' => 'hidden',
                ],
                'security' => [
                    'ignorePageTypeRestriction' => true,
                ],
            ],
            'types' => [
                0 => [
                    'showitem' => 'name,--linebreak--,description,--linebreak--,link_label,link,--linebreak--,image'
                ],
            ],
            'columns' => [
                'name' => $this->getInputTCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_affiliate.name'),
                    30,
                    true
                ),
                'description' => $this->getRTETCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_affiliate.description'),
                ),
                'link_label' => $this->getInputTCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_affiliate.link_label')
                ),
                'link' => $this->getLinkTCADef(
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_affiliate.link'),
                    true,
                    true,
                    [
                        'config' => [
                            'allowedTypes' => ['page', 'url'],
                        ],
                    ]
                    ),
                'image' => $this->getImageTCADef(
                    true,
                    $this->getLLL('locallang_db.xlf:tx_foodrecipes_domain_model_affiliate.image'),
                    0,
                    1
                )
            ]
        ];

        return $newProperties;
    }
}
