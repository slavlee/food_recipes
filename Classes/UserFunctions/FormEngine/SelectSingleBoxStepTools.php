<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\UserFunctions\FormEngine;

use Slavlee\FoodRecipes\Domain\Repository\ToolRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

class SelectSingleBoxStepTools
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
        $repository = $this->getRepository([$params['row']['pid']]);
        $tools = $repository->findByRecipe((int)$params['row']['recipe']);

        foreach ($tools as $tool) {
            $params['items'][] = [
                'label' => $tool['name'],
                'value' => $tool['uid']
            ];
        }
    }

    /**
     * Return repository with configured query settings
     * @param array $storagePageIds
     * @return ToolRepository
     */
    private function getRepository(array $storagePageIds): ToolRepository
    {
        $repository = GeneralUtility::makeInstance(ToolRepository::class);
        $querySettings = $repository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds($storagePageIds);
        $querySettings->setRespectSysLanguage(false);
        $repository->setDefaultQuerySettings($querySettings);

        return $repository;
    }
}
