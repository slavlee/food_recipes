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
class ContentRegister implements SingletonInterface
{
    const NEWSTYPE_DEFAULT = 0;
    const NEWSTYPE_RECIPE = 11;
}
