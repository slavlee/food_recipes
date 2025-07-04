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
    protected float $prepTime = 0;

    /**
     * Summary of cookTime
     * @var float
     */
    protected float $cookTime = 0;

    /**
     * Summary of waitTime
     * @var float
     */
    protected float $waitTime = 0;

    /**
     * Label for wait time
     * @var string
     */
    protected string $waitTimeLabel = '';

    /**
     * Summary of servings
     * @var int
     */
    protected int $servings = 0;

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

    /**
     * Summary of affiliates
     * @var ObjectStorage<Affiliate>
     */
    protected ObjectStorage $affiliates;

    /**
     * Summary of tools
     * @var ObjectStorage<Tool>
     */
    protected ObjectStorage $tools;

    /**
     * Difficulty of the recipe
     * @var int
     */
    protected int $difficulty = 5;

    public function __construct()
    {
        $this->ingredients = new ObjectStorage();
        $this->steps = new ObjectStorage();
        $this->affiliates = new ObjectStorage();
        $this->tools = new ObjectStorage();
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

	/**
	 * Get summary of affiliates
	 *
	 * @return ObjectStorage<Affiliate>
	 */
	public function getAffiliates(): ObjectStorage
	{
		return $this->affiliates;
	}

	/**
	 * Set summary of affiliates
	 *
	 * @param ObjectStorage<Affiliate>  $affiliates
	 *
	 * @return self
	 */
	public function setAffiliates(ObjectStorage $affiliates): self
	{
		$this->affiliates = $affiliates;

		return $this;
	}

    /**
	 * Get summary of tools
	 *
	 * @return ObjectStorage<Tool>
	 */
	public function getTools(): ObjectStorage
	{
		return $this->tools;
	}

	/**
	 * Set summary of tools
	 *
	 * @param ObjectStorage<Tool>  $tools
	 *
	 * @return self
	 */
	public function setTools(ObjectStorage $tools): self
	{
		$this->tools = $tools;

		return $this;
	}

    /**
     * Return comma seperated string to metag keywords
     * @return string
     */
    public function getKeywordsForMetaTag(): string
    {
        $keywords = [$this->getTitle()];

        foreach($this->ingredients as $ingredient) {
            $keywords[] = $ingredient->getName();
        }

        return implode(',', $keywords);
    }

    /**
     * Get summary of waitTime
     *
     * @return  float
     */
    public function getWaitTime()
    {
        return $this->waitTime;
    }

    /**
     * Set summary of waitTime
     *
     * @param  float  $waitTime  Summary of waitTime
     *
     * @return  self
     */
    public function setWaitTime(float $waitTime)
    {
        $this->waitTime = $waitTime;

        return $this;
    }

    /**
     * Get label for wait time
     *
     * @return  string
     */
    public function getWaitTimeLabel()
    {
        return $this->waitTimeLabel;
    }

    /**
     * Set label for wait time
     *
     * @param  string  $waitTimeLabel  Label for wait time
     *
     * @return  self
     */
    public function setWaitTimeLabel(string $waitTimeLabel): self
    {
        $this->waitTimeLabel = $waitTimeLabel;

        return $this;
    }

    /**
     * Get difficulty of the recipe
     *
     * @return  int
     */
    public function getDifficulty(): int
    {
        return $this->difficulty;
    }

    /**
     * Set difficulty of the recipe
     *
     * @param  int  $difficulty  Difficulty of the recipe
     *
     * @return  self
     */
    public function setDifficulty(int $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }
}
