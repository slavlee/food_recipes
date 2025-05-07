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

class Affiliate extends AbstractEntity
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
     * Summary of linkLabel
     * @var string
     */
    protected string $linkLabel = '';

    /**
     * Summary of link
     * @var string
     */
    protected string $link = '';

	/**
	 * Get summary of name
	 *
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Set summary of name
	 *
	 * @param string  $name
	 *
	 * @return self
	 */
	public function setName(string $name): self
	{
		$this->name = $name;

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
	 * Get summary of linkLabel
	 *
	 * @return string
	 */
	public function getLinkLabel(): string
	{
		return $this->linkLabel;
	}

	/**
	 * Set summary of linkLabel
	 *
	 * @param string  $linkLabel
	 *
	 * @return self
	 */
	public function setLinkLabel(string $linkLabel): self
	{
		$this->linkLabel = $linkLabel;

		return $this;
	}

	/**
	 * Get summary of link
	 *
	 * @return string
	 */
	public function getLink(): string
	{
		return $this->link;
	}

	/**
	 * Set summary of link
	 *
	 * @param string  $link
	 *
	 * @return self
	 */
	public function setLink(string $link): self
	{
		$this->link = $link;

		return $this;
	}
}
