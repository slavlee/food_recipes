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

class Tool extends AbstractEntity
{
	/**
	 * Summary of name
	 * @var string
	 */
	protected string $name = '';

	/**
	 * Summary of description
	 * @var string
	 */
	protected string $description = '';

	/**
	 * Summary of isOptional
	 * @var bool
	 */
	protected bool $isOptional = false;

	/**
	 * Summary of image
	 * @var FileReference
	 */
	protected ?FileReference $image = null;

	/**
	 * Summary of alternatives
	 * @var string
	 */
	protected string $alternatives = '';

	/**
	 * Summary of affiliate
	 * @var Affiliate
	 */
    protected ?Affiliate $affiliate = null;

	// Getter and Setter for name
	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	// Getter and Setter for description
	public function getDescription(): string
	{
		return $this->description;
	}

	public function setDescription(string $description): void
	{
		$this->description = $description;
	}

	// Getter and Setter for isOptional
	public function getIsOptional(): bool
	{
		return $this->isOptional;
	}

	public function setIsOptional(bool $isOptional): void
	{
		$this->isOptional = $isOptional;
	}

	// Getter and Setter for image
	public function getImage(): ?FileReference
	{
		return $this->image;
	}

	public function setImage(?FileReference $image): void
	{
		$this->image = $image;
	}

	// Getter and Setter for alternatives
	public function getAlternatives(): string
	{
		return $this->alternatives;
	}

	public function setAlternatives(string $alternatives): void
	{
		$this->alternatives = $alternatives;
	}

	public function getAffiliate(): ?Affiliate
	{
		return $this->affiliate;
	}

	public function setAffiliate(?Affiliate $affiliate): void
	{
		$this->affiliate = $affiliate;
	}
}
