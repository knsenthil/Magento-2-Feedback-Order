<?php
namespace Learning\Orderreview\Model;

class Feedback extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface {

	const CACHE_TAG = 'orderreview';

	protected $_cacheTag = 'orderreview';

	protected $_eventPrefix = 'orderreview';
	
	public function _construct() {
		$this->_init('Learning\Orderreview\Model\ResourceModel\Feedback');
	}
	
	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
	
	public function GetOrderFeedback($order_id) {
		return 'from model';
	}
}