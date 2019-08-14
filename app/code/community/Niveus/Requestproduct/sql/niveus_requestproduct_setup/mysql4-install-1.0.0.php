<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();
 
/**
 * Create table 'niveus_requestproduct_requestnewproduct'
 */
$table = $installer->getConnection()    
    ->newTable($installer->getTable('niveus_requestproduct/requestnewproduct'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_CLOB, 0, array(
        'nullable'  => false,
        ), 'Name')
   ->addColumn('email', Varien_Db_Ddl_Table::TYPE_VARCHAR, 0, array(
        'nullable'  => false,
        ), 'Email')
    ->addColumn('productname', Varien_Db_Ddl_Table::TYPE_VARCHAR, 0, array(
        'nullable'  => false,
        ), 'Product Name')
   ->addColumn('brand', Varien_Db_Ddl_Table::TYPE_VARCHAR, 0, array(
        'nullable'  => false,
        ), 'Brand')
   ->addColumn('seenproduct', Varien_Db_Ddl_Table::TYPE_VARCHAR, 0, array(
        'nullable'  => false,
        ), 'Seen Product')
   ->addColumn('aboutproduct', Varien_Db_Ddl_Table::TYPE_VARCHAR, 0, array(
        'nullable'  => false,
        ), 'About Product');
$installer->getConnection()->createTable($table);
 
$installer->endSetup();
