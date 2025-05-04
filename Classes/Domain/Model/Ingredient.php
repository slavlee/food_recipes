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

class Ingredient extends AbstractEntity
{
    /**
     * Summary of name
     * @var string
     */
    protected string $name = '';

    /**
     * Summary of unit
     * @var string
     */
    protected string $unit = '';

    /**
     * Summary of quantity
     * @var float
     */
    protected float $quantity = 0;

    /**
     * Summary of isMain
     * @var bool
     */
    protected bool $isMain = false;

	/**
	 * Get the value of name
	 *
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @param string $name
	 *
	 * @return self
	 */
	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get summary of unit
	 *
	 * @return string
	 */
	public function getUnit(): string
	{
		return $this->unit;
	}

	/**
	 * Set summary of unit
	 *
	 * @param string  $unit
	 *
	 * @return self
	 */
	public function setUnit(string $unit): self
	{
		$this->unit = $unit;

		return $this;
	}

	/**
	 * Get summary of quantity
	 *
	 * @return float
	 */
	public function getQuantity(): float
	{
		return $this->quantity;
	}

	/**
	 * Set summary of quantity
	 *
	 * @param float  $quantity
	 *
	 * @return self
	 */
	public function setQuantity(float $quantity): self
	{
		$this->quantity = $quantity;

		return $this;
	}

	/**
	 * Get summary of isMain
	 *
	 * @return bool
	 */
	public function getIsMain(): bool
	{
		return $this->isMain;
	}

	/**
	 * Set summary of isMain
	 *
	 * @param bool  $isMain
	 *
	 * @return self
	 */
	public function setIsMain(bool $isMain): self
	{
		$this->isMain = $isMain;

		return $this;
	}
}
