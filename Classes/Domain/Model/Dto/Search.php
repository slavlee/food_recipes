<?php
declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slavlee\FoodRecipes\Domain\Model\Dto;

class Search
{
    /**
     * Selected categories
     * @var array
     */
    protected array $categories = [];

	/**
	 * Get selected categories
	 *
	 * @return array
	 */
	public function getCategories(): array
	{
		return $this->categories;
	}

	/**
	 * Set selected categories
	 *
	 * @param array  $categories
	 *
	 * @return self
	 */
	public function setCategories(array $categories): self
	{
		$this->categories = $categories;

		return $this;
	}
}

