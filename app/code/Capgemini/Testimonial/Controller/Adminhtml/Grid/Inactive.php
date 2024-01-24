<?php
namespace Capgemini\Testimonial\Controller\Adminhtml\Grid;

use Capgemini\Testimonial\Model\ResourceModel\Testimonial\CollectionFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Ui\Component\MassAction\Filter;

class Inactive extends Action
{
    protected $_coreRegistry = null;
    protected $resultPageFactory;
    protected $testimonialFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Registry $registry,
        Filter $filter,
        CollectionFactory $Testimonial
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->testimonialFactory = $Testimonial;
        $this->filter = $filter;
        parent::__construct($context);
    }
    public function execute()
    {
        $collection = $this->filter->getCollection($this->testimonialFactory->create());

        $count = 0;
        foreach ($collection as $child) {
            $child->setStatus(0);
            $child->save();
            $count++;
        }

        $this->messageManager->addSuccess(__('A total of %1 record(s) have been Inactivated.', $count));
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index');
    }
}
