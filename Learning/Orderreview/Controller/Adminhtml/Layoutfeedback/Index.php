<?php
/**
 *
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Learning\Orderreview\Controller\Adminhtml\Layoutfeedback;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
	protected $_resultPage;
		public function __construct(
			\Magento\Backend\App\Action\Context $context,
			\Magento\Framework\View\Result\PageFactory $resultPageFactory
		) {
			parent::__construct($context);
			$this->resultPageFactory = $resultPageFactory;
		}
	 
		public function execute()
		{
			//Call page factory to render layout and page content
			$this->_setPageData();
			return $this->getResultPage();
		}
	 
		 /*
		 * Check permission via ACL resource
		 */
		protected function _isAllowed()
		{
			return $this->_authorization->isAllowed('Learning_Orderreview::manage_feedback');
		}
	 
		public function getResultPage()
		{
			if (is_null($this->_resultPage)) {
				$this->_resultPage = $this->resultPageFactory->create();
			}
			return $this->_resultPage;
		}
	 
		protected function _setPageData()
		{
			$resultPage = $this->getResultPage();
			$resultPage->setActiveMenu('Learning_Orderreview::grid');
			$resultPage->getConfig()->getTitle()->prepend((__('Records')));
	 
			//Add breadcrumb
			$resultPage->addBreadcrumb(__('Learning'), __('Learning'));
			$resultPage->addBreadcrumb(__('Orderreview'), __('Manage Feedback'));
	 
			return $this;
		}
}
