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

class DifficultyViewHelper extends AbstractViewHelper
{
    use ExtensionTrait;

    /**
     * Init new arguments
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('difficulty', 'int', 'Difficulty value between 1 and 10', false);
    }

    /**
     * Render the ViewHelper
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public function render() {
        $value = (int)$this->arguments['difficulty'];

        if (empty($value))
        {
            $value = (int)$this->renderChildren();
        }

        $label = '';

        switch ($value) {
            case 1:
            case 2:
                $label = LocalizationUtility::translate('misc.difficulty.easy', $this->extensionKey);
                break;
            case 3:
            case 4:
            case 5:
                $label = LocalizationUtility::translate('misc.difficulty.medium', $this->extensionKey);
                break;
            case 6:
            case 7:
            case 8:
                $label = LocalizationUtility::translate('misc.difficulty.hard', $this->extensionKey);
                break;
            default:
                $label = LocalizationUtility::translate('misc.difficulty.very_hard', $this->extensionKey);
                break;
        }

        return $label;
    }
}
