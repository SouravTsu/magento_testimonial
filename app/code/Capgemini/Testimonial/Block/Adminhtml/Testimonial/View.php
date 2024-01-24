<?php

namespace Capgemini\Testimonial\Block\Adminhtml\Testimonial;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Magento\Framework\App\RequestInterface;
use Capgemini\Testimonial\Model\Testimonial;

class View extends Template
{

    protected RequestInterface $request;
    protected Testimonial $testimonial;


    /**
     * @param RequestInterface $request
     * @param Context $context
     * @param Testimonial $testimonial
     * @param array $data
     */
    public function __construct(
        RequestInterface $request,
        Context          $context,
        Testimonial      $testimonial,
        array            $data = []
    )
    {

        $this->request = $request;
        $this->testimonial = $testimonial;
        parent::__construct( $context, $data );
    }


    /**
     * @return Testimonial
     */
    public function getTestimonial(): Testimonial
    {
        $testimonialId = $this->request->getParam( "id" );
        return $this->testimonial->load( $testimonialId );
    }

}
