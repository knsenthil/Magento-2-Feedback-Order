<?php
namespace Learning\Orderreview\Model\ResourceModel\Feedback;

use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Collection  extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
	
	const YOUR_TABLE = 'orderreview';
	
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'orderreview_collection';
	protected $_eventObject = 'feedback_collection';
	
	
	//protected $_idFieldName = Learning\Orderreview\Model\Feedback::ID;
	
	public function __construct(
		EntityFactoryInterface $entityFactory,
        LoggerInterface $logger,
        FetchStrategyInterface $fetchStrategy,
        ManagerInterface $eventManager,
        StoreManagerInterface $storeManager,
        AdapterInterface $connection = null,
        AbstractDb $resource = null) {
		$this->_init('Learning\Orderreview\Model\Feedback','Learning\Orderreview\Model\ResourceModel\Feedback');
		
		parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection, $resource);
        $this->storeManager = $storeManager;
	}
	
	protected function _initSelect()
	{
		parent::_initSelect();
		$this->getSelect()->joinLeft(
				['secondTable' => $this->getTable('customer_entity')],
				'main_table.customer_id = secondTable.entity_id',
				'*'
			);
		
	}
	
	/*protected function _renderFilters()
	{
		if ($this->_isFiltersRendered) {
			return $this;
		}
		$this->_renderFiltersBefore(); // Hook for operations before rendering filters
	}
	
	protected function _renderFiltersBefore() {
		$joinTable = $this->getTable('customer_entity');
		$this->getSelect()->join($joinTable.' as secondTable','main_table.customer_id = secondTable.entity_id', array('*'));
		parent::_renderFiltersBefore();
	} */
	
	
}