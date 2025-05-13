<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension: t3templates_base.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Slavlee\FoodRecipes\Bootstrap\TCA;

use Slavlee\FoodRecipes\Bootstrap\Base;
use Slavlee\FoodRecipes\Bootstrap\Traits\ExtensionTrait;
use Slavlee\FoodRecipes\Bootstrap\Traits\TcaTrait;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

class TtContent extends Base
{
    use ExtensionTrait;
    use TcaTrait;

    /**
     * Does the main class purpose
     */
    public function invoke()
    {
        $this->dbTable = 'tt_content';
        $this->registerPlugins();
    }

    /**
     * Add new frontend plugins
     */
    private function registerPlugins(): void
    {
        $pluginSignature = ExtensionUtility::registerPlugin(
            $this->getExtensionKeyAsNamespace(),
            'Search',
            $this->getLLL('locallang_wizard.xlf:foodrecipes_search'),
            'ext-news-plugin-news-search-form',
            'news',
            $this->getLLL('locallang_wizard.xlf:foodrecipes_search.description'),
        );

        ExtensionManagementUtility::addPiFlexFormValue(
            '*',
            'FILE:EXT:news/Configuration/FlexForms/flexform_news_list.xml',
            $pluginSignature
        );

        ExtensionManagementUtility::addToAllTCAtypes(
            'tt_content',
            '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.plugin, pi_flexform',
            $pluginSignature,
            'after:palette:headers'
        );
    }
}
