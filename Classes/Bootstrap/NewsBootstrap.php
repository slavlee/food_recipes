<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\Bootstrap;

use Slavlee\FoodRecipes\Bootstrap\Traits\TcaTrait;
use Slavlee\FoodRecipes\Register\ContentRegister;
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
    }
    
    /**
     * Register new News record type recipe
     */
    private function registerRecipeType(): void
    {
        // Register news type
        $GLOBALS['TCA'][$this->dbTable]['columns']['type']['config']['items'][ContentRegister::NEWSTYPE_RECIPE] =
            [$this->getLLL('locallang_news.xlf:recordtype.recipe'), ContentRegister::NEWSTYPE_RECIPE];

        // Inherit config from News Default
        $GLOBALS['TCA'][$this->dbTable]['types'][ContentRegister::NEWSTYPE_RECIPE] = $GLOBALS['TCA'][$this->dbTable]['types'][ContentRegister::NEWSTYPE_DEFAULT];
    }
}
