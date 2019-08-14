<?php
/**
* @copyright Niveus Solutoins.
*/
class Niveus_Requestproduct_Adminhtml_RequestnewproductController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {  
        // Let's call our initAction method which will set some basic params for each action
        $this->_initAction()
            ->renderLayout();
    }  
//controller with an action which will handle mass delete 
public function massDeleteAction()
{
   
    $requestproductRequestnewproductIds = $this->getRequest()->getParam('id');
 
    if(!is_array($requestproductRequestnewproductIds)) {
        Mage::getSingleton('adminhtml/session')->addError($this->__('Please select feedback.'));
    } else {
        try {
            $model = Mage::getSingleton('niveus_requestproduct/requestnewproduct');
            foreach ($requestproductRequestnewproductIds as $Id) {
                $model->load($Id)->delete();
            }
            Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Total of %d record(s) were deleted.', count($requestproductRequestnewproductIds)));
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
    }
    $this->_redirect('*/*/');
}
     
  
     
    /**
     * Initialize action
     *
     * Here, we set the breadcrumbs and the active menu
     *
     * @return Mage_Adminhtml_Controller_Action
     */
    protected function _initAction()
    {
        $this->loadLayout()
            // Make the active menu match the menu config nodes (without 'children' inbetween)
            ->_setActiveMenu('sales/niveus_requestproduct_requestnewproduct')
            ->_title($this->__('Sales'))->_title($this->__('Request New Product'))
            ->_addBreadcrumb($this->__('Sales'), $this->__('Sales'))
            ->_addBreadcrumb($this->__('Request New Product'), $this->__('Request New Product'));
         
        return $this;
    }
     
    /**
     * Check currently called action by permissions for current user
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('sales/niveus_requestproduct_requestnewproduct');
    }
}
