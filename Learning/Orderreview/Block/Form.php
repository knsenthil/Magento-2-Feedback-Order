<?php
namespace Learning\Orderreview\Block;

use Magento\Framework\Data\Form\Element\CollectionFactory as ElementCollectionFactory;
use Magento\Framework\Data\Form\FormKey;
class Form extends \Magento\Framework\View\Element\Template
{
	protected $customerSession;
	
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
		\Magento\Customer\Model\Session $customerSession,
        $data = [],
        FormKey $formKey)
	{
		parent::__construct($context,$data);
		$this->formKey = $formKey;
		$this->customerSession = $customerSession;
	}
	
	public function getCustomerId() {
    	$customer_id = $this->customerSession->getCustomer()->getId();
        return $customer_id;
    }

	public function sayHello()
	{
		return __('Hello World');
	}
}