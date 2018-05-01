<?php
namespace Learning\Orderreview\Controller\Index;
use Magento\Framework\Controller\ResultFactory;

class Post extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_redirect;
	protected $customerSession;
	protected $_messageManager;
	
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Customer\Model\Session $customerSession
		//\Magento\Framework\Message\ManagerInterface $messageManager
		)
	{
		$this->_pageFactory = $pageFactory;
		//$this->_messageManager = $messageManager;
		parent::__construct($context);
		$this->customerSession = $customerSession;
	}

	public function execute()
	{	
		$data = $this->getRequest()->getParams();
		//echo "<pre>"; print_r($data);
		$model = $this->_objectManager->create('Learning\Orderreview\Model\Feedback');
		$model->setData(array('customer_id' =>$this->customerSession->getCustomer()->getId(), 'order_id' => $data['order'],'feedback_description'=>$this->getRequest()->getParam('feedback'),
		'feedback_rating'=>$this->getRequest()->getParam('rate')))->save();
        $msg = 'Feedback has been updated successfully';  
		//$this->_objectManager->addSuccessMessage($msg);		
		$this->messageManager->addSuccess($msg);
		$resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
		$resultRedirect->setPath('sales/order/history');
		return $resultRedirect;
	}
}