<?php
declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slavlee\FoodRecipes\ViewHelpers\Format;

use Slavlee\FoodRecipes\Bootstrap\Traits\ExtensionTrait;
use Slavlee\FoodRecipes\Utility\DateUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class TimeInISO8601ViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;
    use ExtensionTrait;

    /**
     * Init new arguments
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('value', 'string', 'Value to be formatted', false);
    }

    /**
     * Render the ViewHelper
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext) {
        $value = (int)$arguments['value'];

        if (empty($value))
        {
            $value = (int)$renderChildrenClosure();
        }

        return DateUtility::minutesToISO8601($value);
    }
}
