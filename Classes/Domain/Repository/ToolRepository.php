<?php
declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension food_recipes.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slavlee\FoodRecipes\Domain\Repository;

use Slavlee\FoodRecipes\Register\ContentRegister;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Extbase\Persistence\Repository;

class ToolRepository extends Repository
{
    public function __construct(
        private readonly ConnectionPool $connectionPool,
    ) {
        parent::__construct();
    }

    /**
     * Summary of findByRecipe
     * @param int $recipeUid
     * @return array[]
     */
    public function findByRecipe(int $recipeUid): array
    {
        $queryBuilder = $this->connectionPool
            ->getQueryBuilderForTable('tx_foodrecipes_domain_model_tool');
        $queryBuilder
            ->select('tx_foodrecipes_domain_model_tool.*')
            ->from('tx_foodrecipes_domain_model_tool')
            ->join(
                'tx_foodrecipes_domain_model_tool',
                'tx_news_domain_model_news',
                'recipe',
                $queryBuilder->expr()->inSet(
                    'recipe.tools',
                    $queryBuilder->quoteIdentifier('tx_foodrecipes_domain_model_tool.uid')
                )
            )
            ->where(
                $queryBuilder->expr()->eq(
                    'recipe.uid',
                    $queryBuilder->createNamedParameter($recipeUid, Connection::PARAM_INT)
                ),
                $queryBuilder->expr()->eq(
                    'recipe.type',
                    $queryBuilder->createNamedParameter(ContentRegister::NEWSTYPE_RECIPE, Connection::PARAM_INT)
                ),
            );

        return $queryBuilder->executeQuery()
            ->fetchAllAssociative();
    }
}
