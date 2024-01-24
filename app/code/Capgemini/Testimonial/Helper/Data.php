<?php
namespace Capgemini\Testimonial\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Authorization\Model\UserContextInterface;


class Data extends AbstractHelper
{
    protected CustomerRepositoryInterface $customerRepository;
    protected UserContextInterface $userContext;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        UserContextInterface $userContext
    ) {
        $this->customerRepository = $customerRepository;
        $this->userContext = $userContext;

    }

    public function isAuthorizeCustomer(): bool
    {
        if ($this->userContext->getUserType() === UserContextInterface::USER_TYPE_CUSTOMER && $this->userContext->getUserId()) {
            return true;
        }
        return false;
    }

    public function getCurrentAuthorizeCustomer(): bool|\Magento\Customer\Api\Data\CustomerInterface
    {
        if ($this->isAuthorizeCustomer()) {
            return $this->customerRepository->getById($this->userContext->getUserId());
        }
        return false;
    }
}
