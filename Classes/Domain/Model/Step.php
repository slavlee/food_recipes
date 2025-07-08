<?php
declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slavlee\FoodRecipes\Domain\Model;


use Slavlee\FoodRecipes\Domain\Model\Ingredient;
use Slavlee\FoodRecipes\Domain\Model\Tool;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Step extends AbstractEntity
{
    /**
     * Summary of description
     * @var string
     */
    protected string $description = '';

    /**
     * Summary of ingredients
     * @var ObjectStorage<Ingredient>
     */
    protected ?ObjectStorage $ingredients = null;

    /**
     * Summary of tools
     * @var ObjectStorage<Tool>
     */
    protected ?ObjectStorage $tools = null;

    /**
     * @var ObjectStorage<FileReference>
     */
    protected ObjectStorage $media;

    /**
     * Name of a group this step belongs to.
     * This can be used to group steps together in a recipe.
     * @var string
     */
    protected string $group = '';

    /**
     * Helper property to determine the step number in a recipe with group
     * @param int
     */
    protected int $stepNumber = 0;

    /**
     * Helper property to determine if we want to show group name in frontend,
     * when rendering this step
     * @var bool
     */
    protected bool $showGroup = false;

    public function __construct()
    {
        $this->ingredients = new ObjectStorage();
        $this->tools = new ObjectStorage();
        $this->media = new ObjectStorage();
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
	public function getIngredients(): ?ObjectStorage
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

    /**
	 * Get summary of tools
	 *
	 * @return ObjectStorage<Tool>
	 */
	public function getTools(): ?ObjectStorage
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
     * Get the value of media
     *
     * @return  ObjectStorage<FileReference>
     */
    public function getMedia(): ObjectStorage
    {
        return $this->media;
    }

    /**
     * Set the value of media
     *
     * @param ObjectStorage<FileReference>  $media
     *
     * @return self
     */
    public function setMedia(ObjectStorage $media): self
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get this can be used to group steps together in a recipe.
     *
     * @return  string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set this can be used to group steps together in a recipe.
     *
     * @param  string  $group  This can be used to group steps together in a recipe.
     *
     * @return  self
     */
    public function setGroup(string $group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get when rendering this step
     *
     * @return  bool
     */
    public function getShowGroup()
    {
        return $this->showGroup;
    }

    /**
     * Set when rendering this step
     *
     * @param  bool  $showGroup  when rendering this step
     *
     * @return  self
     */
    public function setShowGroup(bool $showGroup)
    {
        $this->showGroup = $showGroup;

        return $this;
    }

    /**
     * Get helper property to determine the step number in a recipe with group
     */
    public function getStepNumber()
    {
        return $this->stepNumber;
    }

    /**
     * Set helper property to determine the step number in a recipe with group
     *
     * @return  self
     */
    public function setStepNumber($stepNumber)
    {
        $this->stepNumber = $stepNumber;

        return $this;
    }
}
