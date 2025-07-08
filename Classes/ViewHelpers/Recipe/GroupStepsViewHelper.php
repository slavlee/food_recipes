<?php
declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension food_recipes.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slavlee\FoodRecipes\ViewHelpers\Recipe;

use Slavlee\FoodRecipes\Bootstrap\Traits\ExtensionTrait;
use Slavlee\FoodRecipes\Domain\Model\Recipe;
use Slavlee\FoodRecipes\Utility\RecipeUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class GroupStepsViewHelper extends AbstractViewHelper
{
    use ExtensionTrait;

    protected $escapeOutput = false;
    protected $escapeChildren = false;

    /**
     * Init new arguments
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('newsItem', Recipe::class, 'Recipe object', true);
        $this->registerArgument('as', 'string', 'Name of the fluid variable that holds the grouped steps', false, 'groupedSteps');
        $this->registerArgument('asMaxSteps', 'string', 'Name of the fluid variable that holds the max steps count', false, 'maxSteps');
        $this->registerArgument('asHasGroups', 'string', 'Name of the fluid variable that holds the flag if steps has groups', false, 'hasGroups');
    }

    /**
     * Render the ViewHelper
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public function render() {
        /**
         * @var NewsItem $newsItem
         */
        $newsItem = $this->arguments['newsItem'];
        $steps = $newsItem->getSteps();

        if ($steps->count() === 0) {
            return $this->renderChildren();
        }

        $groupedSteps = RecipeUtility::groupSteps($steps);

        $this->templateVariableContainer->add($this->arguments['as'], $groupedSteps);

        return $this->renderChildren();
    }
}
