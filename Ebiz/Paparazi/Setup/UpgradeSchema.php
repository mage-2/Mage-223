<?php
namespace Ebiz\Paparazi\Setup;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
  
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '[1.0.0]', '<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('ebiz_paparazi'),
                'telephone',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, 
                    'nullable' => false, 
                    'comment' => 'TELEPHONE',
                    'after' => 'email'
                ]
            );
        }
		 if (version_compare($context->getVersion(), '[1.0.0]', '<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('ebiz_paparazi'),
                'remark',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 
                    'nullable' => false, 
                    'comment' => 'REMARK'
                ]
            );
        }
		
		
        $setup->endSetup();
    }
}