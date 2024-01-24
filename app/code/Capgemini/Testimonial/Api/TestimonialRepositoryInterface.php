<?php
namespace Capgemini\Testimonial\Api;

use Capgemini\Testimonial\Api\Data\TestimonialInterface;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;

interface TestimonialRepositoryInterface
{
    /**
     * save Testimonial.
     *
     * @param TestimonialInterface $testimonial
     * @return TestimonialInterface
     * @throws InputException If bad input is provided
     * @throws LocalizedException
     */
    public function save(\Capgemini\Testimonial\Api\Data\TestimonialInterface $testimonial);





    /**
     * Retrieve All Testimonial.
     *
     * @return TestimonialInterface[]
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getTestimonialList();

    /**
     * Get Testimonial by Testimonial ID.
     *
     * @param int $testimonialId
     * @return TestimonialInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Testimonial with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById(int $testimonialId);

    /**
     * Delete Testimonial.
     *
     * @param \Capgemini\Testimonial\Api\Data\TestimonialInterface $testimonial
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Capgemini\Testimonial\Api\Data\TestimonialInterface $testimonial);

    /**
     * Delete Testimonial by Testimonial ID.
     *
     * @param int $testimonialId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById(int $id);
}
