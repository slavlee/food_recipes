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

class TimeInMinutesViewHelper extends AbstractViewHelper
{
    use ExtensionTrait;

    /**
     * Init new arguments
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('value', 'string', 'Value to be formatted', false);
        $this->registerArgument('short', 'bool', 'Enable short modus to print mins instead of minutes', false, false);
    }

    /**
     * Render the ViewHelper
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public function render() {
        $value = (int)$this->sarguments['value'];

        if (empty($value))
        {
            $value = (int)$this->renderChildren();
        }

        $suffix = '';

        if ((bool)$this->arguments['short']) {
            $suffix = '.short';
        }

        return DateUtility::minutesToReadableTime(
            $value,
            LocalizationUtility::translate('misc.hour' . $suffix, $this->extensionKey),
            LocalizationUtility::translate('misc.hours' . $suffix, $this->extensionKey),
            LocalizationUtility::translate('misc.minute' . $suffix, $this->extensionKey),
            LocalizationUtility::translate('misc.minutes' . $suffix, $this->extensionKey)
        );
    }
}
