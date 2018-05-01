<?php
namespace Learning\Orderreview\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class Customer extends \Magento\Ui\Component\Listing\Columns\Column {

	/**
     * Column name
     */
    const NAME = 'column.price';

    /**
     * @var \Magento\Framework\Locale\CurrencyInterface
     */
    protected $localeCurrency;
	protected $_customer;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param \Magento\Framework\Locale\CurrencyInterface $localeCurrency
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
		\Magento\Customer\Model\Customer $customer,
        array $components = [],
        array $data = []
    ) {
		$this->_customer = $customer;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
		//echo "<pre>"; print_r($dataSource); 
        if (isset($dataSource['data']['items'])) {
			$fieldName = $this->getData('name'); 
			foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item[$fieldName])) {
					$customer = $this->_customer->getCollection()->addAttributeToFilter('entity_id', array('eq' =>$item[$fieldName]))->getFirstItem();
					//echo "<pre>"; print_r($customer->getFirstItem()->getData()); exit;
					//echo $customer['firstname']; exit;
                    $item[$fieldName] = $customer->getFirstname().$customer->getLastname();
                }
            }
        }
        return $dataSource;
    }

}