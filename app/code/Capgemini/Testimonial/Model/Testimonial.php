<?php
namespace Capgemini\Testimonial\Model;

use Magento\Framework\Model\AbstractModel;
use Capgemini\Testimonial\Api\Data\TestimonialInterface;

class Testimonial extends AbstractModel implements TestimonialInterface
{

    protected function _construct()
    {
        $this->_init( 'Capgemini\Testimonial\Model\ResourceModel\Testimonial' );
    }

    public function getId()
    {
        return $this->getData( self::ID );
    }

    public function setId($id)
    {
        return $this->setData( self::ID, $id );
    }

    public function getTitle()
    {
        return $this->getData( self::TITLE );
    }

    public function setTitle(string $title)
    {
        return $this->setData( self::TITLE, $title );
    }

    public function getBody()
    {
        return $this->getData( self::BODY );
    }

    public function setBody(string $body)
    {
        return $this->setData( self::BODY, $body );
    }

    public function getAuthor()
    {
        return $this->getData( self::AUTHOR );
    }

    public function setAuthor(string $author)
    {
        return $this->setData( self::AUTHOR, $author );
    }

    public function getStatus()
    {
        return $this->getData( self::STATUS );
    }

    public function setStatus(bool $status)
    {
        return $this->setData( self::STATUS, $status );
    }

    public function getPublishDate()
    {
        return $this->getData( self::PUBLISH_DATE );
    }

    public function setPublishDate(string $publishDate)
    {
        return $this->setData( self::PUBLISH_DATE, $publishDate );
    }

    public function getUpdatedAt()
    {
        return $this->getData( self::UPDATED_AT );
    }

    public function setUpdatedAt(string $updatedAt)
    {
        return $this->setData( self::UPDATED_AT, $updatedAt );
    }

    public function getCreatedAt()
    {
        return $this->getData( self::CREATED_AT );
    }

    public function setCreatedAt(string $createdAt)
    {
        return $this->setData( self::CREATED_AT, $createdAt );
    }
}
