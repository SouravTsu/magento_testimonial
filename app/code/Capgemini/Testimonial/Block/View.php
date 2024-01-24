<?php

namespace Capgemini\Testimonial\Block;

use Capgemini\Testimonial\Model\ResourceModel\Testimonial\CollectionFactory as TestimonialCollectionFactory;

class View extends \Magento\Framework\View\Element\Template
{

    protected TestimonialCollectionFactory $testimonialCollectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        TestimonialCollectionFactory                     $testimonialCollectionFactory)
    {
        $this->testimonialCollectionFactory = $testimonialCollectionFactory;
        parent::__construct( $context );
    }

    public function getActiveTestimonials()
    {
        return $this->testimonialCollectionFactory->create()->addFieldToFilter( 'status', ['in' => 1] )->setOrder( 'publish_date', 'DESC' );
    }
}
