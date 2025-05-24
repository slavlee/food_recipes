<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\Utility;

use Slavlee\FoodRecipes\Domain\Model\Recipe;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/*
 * This file is part of the TYPO3 extension food_recipes.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

class StruturedDataUtility
{
    /**
     * Return structured data for a recipe
     * @param \Slavlee\FoodRecipes\Domain\Model\Recipe $recipe
     * @return array{@context: string, @type: string, author: array{@type: string, name: mixed, cookTime: mixed, description: mixed, image: mixed, name: mixed, prepTime: mixed, recipeIngredient: mixed, recipeInstructions: mixed, recipeYield: mixed, totalTime: mixed}}
     */
    public static function getRecipeStructuredData(Recipe $recipe): string
    {
        $totalTime = $recipe->getPrepTime() + $recipe->getCookTime();

        return \json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Recipe',
            'name' => $recipe->getTitle(),
            'description' => $recipe->getBodytext(),
            'image' => $recipe->getMediaPreviews()[0]->getOriginalResource()->getPublicUrl(),
            'author' => [
                '@type' => 'Person',
                'name' => $recipe->getAuthor(),
            ],
            'prepTime' => 'PT' . (string)$recipe->getPrepTime() . 'M',
            'cookTime' => 'PT' . (string)$recipe->getCookTime() . 'M',
            'totalTime' => 'PT' . (string)$totalTime . 'M',
            'recipeYield' => $recipe->getServings(),
            'recipeIngredient' => self::formatIngredientsToSimpleList($recipe->getIngredients()),
            'recipeInstructions' => self::formatInstructions($recipe->getSteps()),
        ]);
    }

    /**
     * Format ingredients to a simple list
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $ingredients
     * @return array
     */
    public static function formatIngredientsToSimpleList(ObjectStorage $ingredients): array
    {
        $simpleList = [];

        foreach ($ingredients as $ingredient) {
            /**
             * @var \Slavlee\FoodRecipes\Domain\Model\Ingredient $ingredient
             */
            $simpleList[] = $ingredient->getName();
        }

        return $simpleList;
    }

    public static function formatInstructions(ObjectStorage $steps): array
    {
        $formattedInstructions = [];

        foreach ($steps as $step) {
            /**
             * @var \Slavlee\FoodRecipes\Domain\Model\Step $step
             */
            $newInstruction = [
                '@type' => 'HowToStep',
                'text' => $step->getDescription(),
            ];

            if ($step->getMedia()->count() > 0) {
                $newInstruction['image'] = $step->getMedia()->offsetGet(0)->getOriginalResource()->getPublicUrl();
            }

            $formattedInstructions[] = $newInstruction;
        }

        return $formattedInstructions;
    }
}
