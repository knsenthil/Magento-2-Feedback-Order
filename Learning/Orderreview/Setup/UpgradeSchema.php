<?php
namespace Learning\Orderreview\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
			/**
             * Add full text index to our table orderreview
             */
			 
		$installer = $setup;
        $installer->startSetup();
		if (version_compare($context->getVersion(), '1.0.3') < 0) {
			$tableName = $installer->getTable('orderreview');
			$fullTextIntex = array('feedback_description'); // Column with fulltext index, you can put multiple fields


			$setup->getConnection()->addIndex(
				$tableName,
				$installer->getIdxName($tableName, $fullTextIntex, \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT),
				$fullTextIntex,
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}

		/**
		 * Add full text index to our table orderreview
		 */

		/*$tableName = $installer->getTable('orderreview');
		$fullTextIntex = array('title', 'type', 'location', 'description'); // Column with fulltext index, you can put multiple fields


		$setup->getConnection()->addIndex(
			$tableName,
			$installer->getIdxName($tableName, $fullTextIntex, \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT),
			$fullTextIntex,
			\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
		); */
	}
}