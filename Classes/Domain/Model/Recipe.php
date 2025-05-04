<?php
declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slavlee\FoodRecipes\Domain\Model;

use GeorgRinger\News\Domain\Model\News;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Recipe extends News
{
    /**
     * Summary of prepTime
     * @var float
     */
    protected $prepTime = 0;

    /**
     * Summary of cookTime
     * @var float
     */
    protected $cookTime = 0;

    /**
     * Summary of servings
     * @var int
     */
    protected $servings = 0;

    /**
     * Summary of ingredients
     * @var ObjectStorage<Ingredient>
     */
    protected ObjectStorage $ingredients;

    /**
     * Summary of ingredients
     * @var ObjectStorage<Step>
     */
    protected ObjectStorage $steps;

    public function __construct()
    {
        $this->ingredients = new ObjectStorage();
        $this->steps = new ObjectStorage();
    }

	/**
	 * Get summary of prepTime
	 *
	 * @return float
	 */
	public function getPrepTime(): float
	{
		return $this->prepTime;
	}

	/**
	 * Set summary of prepTime
	 *
	 * @param float  $prepTime
	 *
	 * @return self
	 */
	public function setPrepTime(float $prepTime): self
	{
		$this->prepTime = $prepTime;

		return $this;
	}

	/**
	 * Get summary of servings
	 *
	 * @return int
	 */
	public function getServings(): int
	{
		return $this->servings;
	}

	/**
	 * Set summary of servings
	 *
	 * @param int  $servings
	 *
	 * @return self
	 */
	public function setServings(int $servings): self
	{
		$this->servings = $servings;

		return $this;
	}

	/**
	 * Get summary of cookTime
	 *
	 * @return float
	 */
	public function getCookTime(): float
	{
		return $this->cookTime;
	}

	/**
	 * Set summary of cookTime
	 *
	 * @param float  $cookTime
	 *
	 * @return self
	 */
	public function setCookTime(float $cookTime): self
	{
		$this->cookTime = $cookTime;

		return $this;
	}

	/**
	 * Get summary of ingredients
	 *
	 * @return ObjectStorage<Ingredient>
	 */
	public function getIngredients(): ObjectStorage
	{
		return $this->ingredients;
	}

	/**
	 * Set summary of ingredients
	 *
	 * @param ObjectStorage<Ingredient> $ingredients
	 *
	 * @return self
	 */
	public function setIngredients(ObjectStorage $ingredients): self
	{
		$this->ingredients = $ingredients;

		return $this;
	}

	/**
	 * Get summary of ingredients
	 *
	 * @return ObjectStorage<Step>
	 */
	public function getSteps(): ObjectStorage
	{
		return $this->steps;
	}

	/**
	 * Set summary of ingredients
	 *
	 * @param ObjectStorage<Step>  $steps
	 *
	 * @return self
	 */
	public function setSteps(ObjectStorage $steps): self
	{
		$this->steps = $steps;

		return $this;
	}
}
