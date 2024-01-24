<?php
namespace Capgemini\Testimonial\Ui\DataProvider;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Capgemini\Testimonial\Model\ResourceModel\Testimonial\Grid\CollectionFactory;


class TestimonialDataProvider extends AbstractDataProvider
{
    /**
     * constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        string            $name,
        string            $primaryFieldName,
        string            $requestFieldName,
        CollectionFactory $collectionFactory,
        array             $meta = [],
        array             $data = []
    )
    {
        parent::__construct( $name, $primaryFieldName, $requestFieldName, $meta, $data );
        $this->collection = $collectionFactory->create();
    }

    public function getData()
    {
        return parent::getData();
    }

    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        return parent::addFilter( $filter );
    }


    public function getMeta()
    {
        return parent::getMeta();
    }


    public function getSearchCriteria()
    {
        return $this->getCollection();
    }

}
