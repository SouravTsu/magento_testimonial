<?php
namespace Capgemini\Testimonial\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Testimonial extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('cg_testimonial', 'id');
    }
}