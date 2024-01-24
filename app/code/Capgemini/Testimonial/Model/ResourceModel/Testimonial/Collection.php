<?php
namespace Capgemini\Testimonial\Model\ResourceModel\Testimonial;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Capgemini\Testimonial\Model\Testimonial', 'Capgemini\Testimonial\Model\ResourceModel\Testimonial');
    }
}