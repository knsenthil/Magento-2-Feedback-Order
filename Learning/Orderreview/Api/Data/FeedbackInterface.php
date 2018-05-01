<?php
/**
 * Webkul_Grid Grid Interface.
 *
 * @category    Webkul
 *
 * @author      Webkul Software Private Limited
 */
namespace Learning\Orderreview\Api\Data;
 
interface FeedbackInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const ORDER_ID = 'order_id';
    const CUSTOMER_ID = 'customer_id';
    const FEEDBACK_DESCRIPTION = 'feedback_description';
    const FEEDBACK_RATING = 'feedback_rating';
    const CREATED_AT = 'created_at';
 
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getId();
 
    /**
     * Set EntityId.
     */
    public function setId($id);
 
    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getOrderId();
 
    /**
     * Set Title.
     */
    public function setOrderId($orderId);
 
    /**
     * Get Content.
     *
     * @return varchar
     */
    public function getCustomerId();
 
    /**
     * Set Content.
     */
    public function setCustomerId($customerId);
 
    /**
     * Get Publish Date.
     *
     * @return varchar
     */
    public function getFeedbackDescription();
 
    /**
     * Set PublishDate.
     */
    public function setFeedbackDescription($feedbackDescription);
 
    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getFeedbackRating();
 
    /**
     * Set StartingPrice.
     */
    public function setFeedbackRating($feedbackRating);
 
    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt();
 
    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);
}