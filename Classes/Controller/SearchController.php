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

use GeorgRinger\News\Domain\Repository\CategoryRepository;
use Psr\Http\Message\ResponseInterface;
use Slavlee\FoodRecipes\Domain\Model\Dto\Search;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
final class SearchController extends ActionController
{

    public function __construct(
        private readonly CategoryRepository $categoryRepository
    ) {}

    /**
     * Show search form
     * @param Search $search
     * @return ResponseInterface
     */
    public function formAction(Search $search = null)
    {
        if (!$search) {
            $search = new Search();
        }

        $idList = explode(',', $this->settings['categories'] ?? '');

        $startingPoint = null;
        if (!empty($this->settings['startingpoint'] ?? '')) {
            $startingPoint = $this->settings['startingpoint'];
        }

        $categories = $this->categoryRepository->findTree($idList, $startingPoint);

        $this->view->assign('categories', $categories);
        $this->view->assign('search', $search);

        return $this->htmlResponse();
    }
}
