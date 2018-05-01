<?php

namespace Learning\Orderrevew\Block\Adminhtml;

class Grid extends \Magento\Backend\Block\Widget\Grid\Container
{
	 protected function _construct()
    {
        $this->_blockGroup = 'Learning_Orderrevew';
        $this->_controller = 'adminhtml_layoutfeedback';
        $this->_headerText = __('feedback');
        $this->_addButtonLabel = __('Add New feedback');
        parent::_construct();
    }
}