<?php

namespace Learning\Orderrevew\Block\Adminhtml\Layoutfeedback;

class Grid extends \Magento\Backend\Block\Widget\Grid\Container
{
	 protected function _construct()
    {
        $this->_blockGroup = 'Learning_Orderrevew';
        $this->_controller = 'adminhtml_layoutfeedback';
        $this->_headerText = __('feedback');
        $this->_addButtonLabel = __('Add New feedback');
        parent::_construct();
        $this->buttonList->add(
            'affiliate_apply',
            [
                'label' => __('Affiliate'),
                'onclick' => "location.href='" . $this->getUrl('learning_orderreview/*/applyAffiliate') . "'",
                'class' => 'apply'
            ]
        );
    }
}