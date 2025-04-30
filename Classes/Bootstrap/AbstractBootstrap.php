<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\Bootstrap;

use Slavlee\FoodRecipes\Bootstrap\Traits\ExtensionTrait;
use TYPO3\CMS\Core\SingletonInterface;

/*
 * This file is part of the TYPO3 extension food_recipes.
 *
 * Init all necessary processes to register t3t container elements
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

abstract class AbstractBootstrap  implements SingletonInterface {

    use ExtensionTrait;

    /**
     * Run Bootstrap class
     */
    abstract public function invoke(): void;
}
