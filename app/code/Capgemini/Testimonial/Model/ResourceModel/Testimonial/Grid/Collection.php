<?php
namespace Capgemini\Testimonial\Model\ResourceModel\Testimonial\Grid;

//use Capgemini\Testimonial\Model\ResourceModel\ConversionRate\Collection as ConversionRateCollection;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Psr\Log\LoggerInterface as Logger;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;


class Collection extends SearchResult
{
    public function __construct(
        EntityFactory $entityFactory,
        Logger $logger,
        FetchStrategy $fetchStrategy,
        EventManager $eventManager,
                      $mainTable = 'cg_testimonial',
                      $resourceModel = \Capgemini\Testimonial\Model\ResourceModel\Testimonial::class,
                      $identifierName = null,
                      $connectionName = null)
    {
        parent::__construct(
            $entityFactory,
            $logger,
            $fetchStrategy,
            $eventManager,
            $mainTable,
            $resourceModel,
            $identifierName,
            $connectionName);
    }

    /**
     * @return Collection|void
     */
    public function _initSelect()
    {
        return parent::_initSelect();
    }

    /**
     * @return int
     */
    public function getCurrentPage(){

        return $this->getCurPage();

    }

    /**
     * @param $currentPage
     * @return Collection
     */
    public function setCurrentPage($currentPage){

        return $this->setCurPage($currentPage);

    }
}
