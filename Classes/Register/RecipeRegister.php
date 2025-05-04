<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\Register;

use TYPO3\CMS\Core\SingletonInterface;
/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */
class RecipeRegister implements SingletonInterface
{
    const UNIT_GRAMS = 'grams';
    const UNIT_CUPS = 'cups';
    const UNIT_TABLESPOONS = 'tablespoons';
    const UNIT_TEASPOONS = 'teaspoons';
    const UNIT_PIECES = 'pieces';
    const UNIT_ML = 'milliliter';

    const PALETTE_RECIPE = 'recipe';
    const PALETTE_RECIPESTEPS = 'recipe_steps';
}
