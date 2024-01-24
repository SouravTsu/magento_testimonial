<?php

namespace Capgemini\Testimonial\Model;

use Capgemini\Testimonial\Api\TestimonialRepositoryInterface;
use Capgemini\Testimonial\Api\Data\TestimonialInterface;
use Capgemini\Testimonial\Model\TestimonialFactory as TestimonialModelFactory;
use Capgemini\Testimonial\Model\ResourceModel\Testimonial as TestimonialResourceModel;
use Capgemini\Testimonial\Model\ResourceModel\Testimonial\CollectionFactory as TestimonialCollectionFactory;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\CouldNotSaveException;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Authorization\Model\UserContextInterface;
use Capgemini\Testimonial\Helper\Data as TestimonialHelperData;


class TestimonialRepository implements TestimonialRepositoryInterface
{

    protected TestimonialModelFactory $testimonialModelFactory;
    protected TestimonialResourceModel $testimonialResourceModel;

    protected CustomerRepositoryInterface $customerRepository;
    protected UserContextInterface $userContext;
    protected TestimonialCollectionFactory $testimonialCollectionFactory;
    protected TestimonialHelperData $testimonialHelperData;

    public function __construct(
        TestimonialModelFactory      $testimonialModelFactory,
        TestimonialResourceModel     $testimonialResourceModel,
        TestimonialCollectionFactory $testimonialCollectionFactory,
        CustomerRepositoryInterface  $customerRepository,
        UserContextInterface         $userContext,
        TestimonialHelperData        $testimonialHelperData

    )
    {
        $this->testimonialModelFactory = $testimonialModelFactory;
        $this->testimonialResourceModel = $testimonialResourceModel;
        $this->testimonialCollectionFactory = $testimonialCollectionFactory;
        $this->customerRepository = $customerRepository;
        $this->userContext = $userContext;
        $this->testimonialHelperData = $testimonialHelperData;
    }

    public function getTestimonialList()
    {
        try {
            if ($this->testimonialHelperData->isAuthorizeCustomer()) {
                if ($this->testimonialHelperData->getCurrentAuthorizeCustomer()) {
                    $email = $this->testimonialHelperData->getCurrentAuthorizeCustomer()->getEmail();
                    $collection = $this->testimonialCollectionFactory->create()->addFieldToFilter( 'author', ['in' => $email] );
                    return $collection->getItems();
                }
            }
            throw new NoSuchEntityException( __( 'Invalidated user Authorization key' ) );
        } catch (\Exception $e) {
            throw new CouldNotSaveException( __( $e->getMessage() ) );
        }
    }


    public function getById(int $testimonialId): TestimonialInterface|Testimonial
    {
        if ($this->testimonialHelperData->isAuthorizeCustomer()) {
            $testimonialModel = $this->testimonialModelFactory->create();
            $this->testimonialResourceModel->load( $testimonialModel, $testimonialId );

            if ($testimonialModel->getAuthor() !== $this->testimonialHelperData->getCurrentAuthorizeCustomer()->getEmail()) {
                throw new NoSuchEntityException( __( 'user and testimonial Author not match' ) );
            }
            if (!$testimonialModel->getId()) {
                throw new NoSuchEntityException( __( 'Unable to find testimonial with ID "%1"', $testimonialId ) );
            }
            return $testimonialModel;
        }
        throw new NoSuchEntityException( __( 'Invalidated user Authorization key' ) );
    }


    public function save(TestimonialInterface $testimonial): TestimonialInterface
    {
        try {
            if ($this->testimonialHelperData->isAuthorizeCustomer()) {
                if ($testimonial->getId()) {
                    $this->getById( $testimonial->getId() );
                }
                $testimonialModel = $this->testimonialModelFactory->create();
                $testimonialModel->setData( $testimonial->getData() );
                $testimonialModel->setStatus( false );
                $testimonialModel->setAuthor( $this->testimonialHelperData->getCurrentAuthorizeCustomer()->getEmail() );
                $this->testimonialResourceModel->save( $testimonialModel );
            }
            else{
                throw new NoSuchEntityException( __( 'Invalidated user Authorization key' ) );
            }

        } catch (\Exception $e) {
            throw new CouldNotSaveException( __( $e->getMessage() ) );
        }
        return $testimonialModel;
    }


    public function update(TestimonialInterface $testimonial): TestimonialInterface
    {
        $this->testimonialResourceModel->save( $testimonial );
        return $testimonial;
    }

    public function delete(TestimonialInterface $testimonial): bool
    {
        try {

            $this->testimonialResourceModel->delete( $testimonial );
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(
                __( 'Could not delete the entry: %1', $e->getMessage() )
            );
        }
        return true;
    }

    public function deleteById(int $id): bool
    {
        return $this->delete( $this->getById( $id ) );
    }


}
