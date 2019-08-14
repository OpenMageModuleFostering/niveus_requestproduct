<?php
/**
* @copyright Niveus Solutoins.
*/
class Niveus_Requestproduct_Model_Mysql4_Requestnewproduct extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {  
        $this->_init('niveus_requestproduct/requestnewproduct', 'id');
    }  
}