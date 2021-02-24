<?php
namespace Webappmate\StoreCount\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{

    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();
        $context->getVersion();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('webappmate_visitor_data')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true],
            'ID'
        )->addColumn(
            'store_name',
            Table::TYPE_TEXT,
            255,
            [],
            'StoreName'
        )->addColumn(
            'store_id',
           Table::TYPE_INTEGER,
            5,
            [],
            'StoreId'
        )->addColumn(
            'count',
           Table::TYPE_INTEGER,
            5,
            [],
            'Count'
        )->addIndex(
            $setup->getIdxName('webappmate_visitor_data', ['id']),
            ['id']
        )->setComment(
            'visitor_data'
        );
        $setup->getConnection()->createTable($table);
        $setup->endSetup();
    }
}