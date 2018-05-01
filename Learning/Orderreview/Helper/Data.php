<?php
namespace Learning\Orderreview\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
	protected $_objectManager;
	protected $_feedbackFactory;
	protected $_feedbackCollection;
	//protected $_searchResult;

	public function __construct(\Magento\Framework\ObjectManagerInterface $objectmanager,
	\Magento\Framework\App\Helper\Context $context, 
	 \Learning\Orderreview\Model\FeedbackFactory $feedbackFactory,
	 //\Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult $searchResult,
	 \Learning\Orderreview\Model\ResourceModel\Feedback\Collection $feedbackCollection
	) {
			$this->_objectManager = $objectmanager;
		 $this->_feedbackFactory = $feedbackFactory;
		 $this->_feedbackCollection = $feedbackCollection;
		 //$this->_searchResult = $searchResult;
		 parent::__construct($context);
	}
	
    public function GetOrderFeedback($order_id)
    {
		//return $messages = $this->_feedbackFactory->getCollection()->addFieldToFilter('order_id',$order_id);
        //return $model =  $this->_feedbackFactory->GetOrderFeedback($order_id);
		//$model =  $this->_feedbackFactory->create()->load($order_id);
		$messages_model = $this->_feedbackFactory->create();
		$messages_model->load($order_id,'order_id');
		return !$messages_model->getId();
		/*if(!$messages_model->getId()){
			return  "not found";
		} else {
			return  "found";
		} */
      
    }
	
	public function test() {
		return true;
	}
}