<?php

namespace Learning\Orderrevew\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Layoutfeedback extends Container
{
   /**
     * Constructor
     *
     * @return void
     */
   protected function _construct()
    {
        $this->_controller = 'adminhtml_layoutfeedback';
        $this->_blockGroup = 'Learning_Orderrevew';
        $this->_headerText = __('Manage Feedback');
        $this->_addButtonLabel = __('Add Feedback');
        parent::_construct();
    }
}