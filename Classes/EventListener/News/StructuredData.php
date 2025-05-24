<?php
declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension t3templates_base.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slavlee\FoodRecipes\EventListener\News;

use GeorgRinger\News\Event\NewsDetailActionEvent;
use Slavlee\FoodRecipes\Domain\Model\Recipe;
use Slavlee\FoodRecipes\Utility\StruturedDataUtility;
use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Page\AssetCollector;

#[AsEventListener(
    identifier: 'food-recipes/set-db-prop-value-conditions-for-random',
)]
class StructuredData
{
    /**
     * @var AssetCollector $assetCollector
     */
    protected ?AssetCollector $assetCollector = null;

    /**
     * @var NewsDetailActionEvent
     */
    protected $event;

    /**
     * @var array
     */
    private $structuredData = [];

    /**
     * Inject $assetCollector
     * @param AssetCollector $assetCollector
     * @return void
     */
    public function injectAssetCollector(AssetCollector $assetCollector)
    {
        $this->assetCollector = $assetCollector;
    }

    /**
     * Executes the EventListener
     */
    public function __invoke(NewsDetailActionEvent $event): void
    {
        $this->event = $event;

        if ($this->isEnabled()) {
            $this->embedStructuredData();
            $jsonld = json_encode($this->structuredData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

            $this->assetCollector->addInlineJavaScript(
                'structured_data_news_' . $this->event->getAssignedValues()['newsItem']->getUid(),
                $jsonld,
                ['type' => 'application/ld+json']
            );
        }
    }

    /**
     * Embed structured data
     * @return void
     */
    protected function embedStructuredData(): void
    {
        $this->createStructuredData();
    }

    /**
     * Returns true, if embedding of structured data
     * is enabled
     * @return bool
     */
    protected function isEnabled(): bool
    {
        $newsItem = $this->event->getAssignedValues()['newsItem'];

        if ($newsItem instanceof Recipe !== true) {
            // Only recipes have structured data
            return false;
        }

        return true;
    }

    /**
     * Init the $this->structuredData array
     * @return void
     */
    private function createStructuredData(): void {
        $this->structuredData = StruturedDataUtility::getRecipeStructuredData($this->event->getAssignedValues()['newsItem']);
    }
}
