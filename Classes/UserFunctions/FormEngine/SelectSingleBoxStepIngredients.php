<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\UserFunctions\FormEngine;

use Slavlee\FoodRecipes\Domain\Repository\IngredientRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

class SelectSingleBoxStepIngredients
{
    /**
     * Passed parameters
     * items (passed by reference)
     * config (TCA config of the field)
     * TSconfig (The matching itemsProcFunc TSconfig)
     * table (current table)
     * row (current database record)
     * field (current field name)
     * effectivePid (correct page ID)
     * site (current site)
     */
    public function itemsProcFunc(&$params): void
    {
        $ingredientRepository = $this->getIngredientRepository([$params['row']['pid']]);
        $ingredients = $ingredientRepository->findBy(['recipe' => (int)$params['row']['recipe']]);

        foreach ($ingredients as $ingredient) {
            $params['items'][] = [
                'label' => $ingredient->getName(),
                'value' => $ingredient->getUid()
            ];
        }
    }

    private function getIngredientRepository(array $storagePageIds): IngredientRepository
    {
        $ingredientRepository = GeneralUtility::makeInstance(IngredientRepository::class);
        $querySettings = $ingredientRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds($storagePageIds);
        $querySettings->setRespectSysLanguage(false);
        $querySettings->setEnableFieldsToBeIgnored(['deleted']);
        $ingredientRepository->setDefaultQuerySettings($querySettings);

        return $ingredientRepository;
    }
}
