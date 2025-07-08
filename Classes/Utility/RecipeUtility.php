<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\Utility;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/*
 * This file is part of the TYPO3 extension food_recipes.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

class RecipeUtility
{
    /**
     * Groups recipe steps by their group property.
     * This method iterates through the steps and organizes them into an associative array
     * where the keys are the group names and the values are arrays of steps belonging to that
     * group.
     * @param ObjectStorage $steps An ObjectStorage containing Step objects.
     * @return array An associative array where keys are group names and values are arrays of Step
     */
    public static function groupSteps(ObjectStorage $steps): array
    {
        $groups = [];
        $groupedSteps = [];
        $stepNumber = 0;

        foreach ($steps as $step) {
            if ($step->getGroup() !== '' && !\in_array($step->getGroup(), $groups)) {
                $groups[] = $step->getGroup();
                $step->setShowGroup(true);
                $groupedSteps[] = clone $step;
            }

            $stepNumber++;
            $step->setStepNumber($stepNumber);
            $step->setShowGroup(false);
            $groupedSteps[] = $step;
        }

        return $groupedSteps;
    }
}
