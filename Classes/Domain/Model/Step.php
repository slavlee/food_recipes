<?php
declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slavlee\FoodRecipes\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Step extends AbstractEntity
{
    /**
     * Summary of number
     * @var int
     */
    protected int $number = 0;

    /**
     * Summary of description
     * @var string
     */
    protected string $description = '';

    /**
     * Summary of ingredients
     * @var ObjectStorage<Ingredient>
     */
    protected ObjectStorage $ingredients;

    public function __construct()
    {
        $this->ingredients = new ObjectStorage();
    }

	/**
	 * Get summary of number
	 *
	 * @return int
	 */
	public function getNumber(): int
	{
		return $this->number;
	}

	/**
	 * Set summary of number
	 *
	 * @param int  $number
	 *
	 * @return self
	 */
	public function setNumber(int $number): self
	{
		$this->number = $number;

		return $this;
	}

	/**
	 * Get summary of description
	 *
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * Set summary of description
	 *
	 * @param string  $description
	 *
	 * @return self
	 */
	public function setDescription(string $description): self
	{
		$this->description = $description;

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
	 * @param ObjectStorage<Ingredient>  $ingredients
	 *
	 * @return self
	 */
	public function setIngredients(ObjectStorage $ingredients): self
	{
		$this->ingredients = $ingredients;

		return $this;
	}
}
