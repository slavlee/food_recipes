<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension: food_recipes.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Slavlee\FoodRecipes\Controller;

use GeorgRinger\News\Controller\NewsController;
use GeorgRinger\News\Domain\Repository\CategoryRepository;
use GeorgRinger\News\Domain\Repository\NewsRepository;
use GeorgRinger\News\Domain\Repository\TagRepository;
use Psr\Http\Message\ResponseInterface;
use Slavlee\FoodRecipes\Utility\StruturedDataUtility;
use TYPO3\CMS\Core\Page\AssetCollector;

final class SearchController extends NewsController
{
    public function __construct(
        NewsRepository $newsRepository,
        CategoryRepository $categoryRepository,
        TagRepository $tagRepository,
        private readonly AssetCollector $assetCollector,
    ) {
        parent::__construct($newsRepository, $categoryRepository, $tagRepository);
    }

    /**
     * Show search form
     * @param array|null $overwriteDemand
     * @return ResponseInterface
     */
    public function listAction(?array $overwriteDemand = null): ResponseInterface
    {
        $idList = explode(',', $this->settings['categories'] ?? '');

        $startingPoint = null;
        if (!empty($this->settings['startingpoint'] ?? '')) {
            $startingPoint = $this->settings['startingpoint'];
        }

        $categories = $this->categoryRepository->findTree($idList, $startingPoint);

        $this->view->assign('categoriesForFilter', $categories);

        return parent::listAction($overwriteDemand);
    }

    /**
     * Summary of detailAction
     * @param \GeorgRinger\News\Domain\Model\News $news
     * @param mixed $currentPage
     * @return ResponseInterface
     */
    public function detailAction(?\GeorgRinger\News\Domain\Model\News $news = null, $currentPage = 1): ResponseInterface
    {
        // Add structured data
        $this->assetCollector->addInlineJavaScript(
            'food_recipes_structured_data_' . $news->getUid(),
            StruturedDataUtility::getRecipeStructuredData($news),
            [
                'type' => 'application/ld+json',
            ]
        );
        debug(__FILE__);
        return parent::detailAction($news, $currentPage);
    }
}
