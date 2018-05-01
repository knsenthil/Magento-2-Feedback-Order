<?php
namespace Learning\Orderreview\Block\Adminhtml;

class Feedback extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_feedback';
		$this->_blockGroup = 'Learning_Orderreview';
		$this->_headerText = __('Manage Feedback');
		$this->_addButtonLabel = __('Create New Feedback');
		parent::_construct();
	}
}