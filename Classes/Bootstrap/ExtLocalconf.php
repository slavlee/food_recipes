<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension: food_recipes.
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

namespace Slavlee\FoodRecipes\Bootstrap;

use Slavlee\FoodRecipes\Bootstrap\Traits\ExtensionTrait;
use Slavlee\FoodRecipes\Controller\SearchController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

class ExtLocalconf extends Base
{
    use ExtensionTrait;

    /**
     * Does the main class purpose
     */
    public function invoke()
    {
        $this->configurePlugins();
    }

    /**
     * ExtensionUtility::configurePlugin
     */
    private function configurePlugins()
    {
        ExtensionUtility::configurePlugin(
            $this->getExtensionKeyAsNamespace(),
            'Search',
            [
               SearchController::class => 'list,detail',
            ],
            [
                SearchController::class => 'list,detail',
            ],
            ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
         );
    }
}
