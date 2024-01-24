<?php
namespace Capgemini\Testimonial\Api\Data;

interface TestimonialInterface
{
    const ID = 'id';
    const TITLE = 'title';
    const BODY = 'body';
    const AUTHOR = 'author';
    const STATUS = 'status';
    const PUBLISH_DATE = 'publish_date';
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';

    /**
     * Get Testimonial id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set Testimonial id
     *
     * @param int $id
     * @return $this
     */
    public function setId(int $id);

    /**
     * Get Testimonial id
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Set Testimonial Title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title);

    /**
     * Get Testimonial Body
     *
     * @return string|null
     */
    public function getBody();

    /**
     * Set Testimonial Title
     *
     * @param string $body
     * @return $this
     */
    public function setBody(string $body);

    /**
     * Get Testimonial Body
     *
     * @return string|null
     */
    public function getAuthor();

    /**
     * Set Testimonial Author
     *
     * @param  string $author
     * @return $this
     */
    public function setAuthor(string $author);

    /**
     * Get Testimonial Status
     *
     * @return bool|null
     */
    public function getStatus();

    /**
     * Set Testimonial Status
     *
     * @param  bool $status
     * @return $this
     */
    public function setStatus( bool $status);

    /**
     * Get Testimonial PublishDate
     *
     * @return string|null
     */
    public function getPublishDate();

    /**
     * Set Testimonial PublishDate
     *
     * @param  string $publishDate
     * @return $this
     */
    public function setPublishDate(string $publishDate);

    /**
     * Get Testimonial UpdatedAt
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set Testimonial UpdatedAt
     *
     * @param  string $updatedAt
     * @return $this
     */
    public function setUpdatedAt(string $updatedAt);

    /**
     * Get Testimonial CreatedAt
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set Testimonial CreatedAt
     *
     * @param  string $createdAt
     * @return $this
     */
    public function setCreatedAt(string $createdAt);
}
