<?php
/**
* @copyright Niveus Solutoins.
*/
class Niveus_Requestproduct_Block_Adminhtml_Requestnewproduct extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {   
        $this->_blockGroup = 'niveus_requestproduct';
        $this->_controller = 'adminhtml_requestnewproduct';
        $this->_headerText = $this->__('Request New Product');
         
        parent::__construct();
        $this->_removeButton('add');
    }
}
