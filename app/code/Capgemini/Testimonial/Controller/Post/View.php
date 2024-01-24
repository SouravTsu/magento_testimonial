<?php
namespace Capgemini\Testimonial\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Capgemini\Testimonial\Model\TestimonialFactory;

class view extends Action
{
    protected $_pageFactory;
    protected $_testimonialFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        TestimonialFactory $_testimonialFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_testimonialFactory = $_testimonialFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Testimonials Post View'));
        return $resultPage;
    }
}
