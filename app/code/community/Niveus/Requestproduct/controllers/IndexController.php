<?php

/**
 * @copyright Niveus Solutoins.
 */
class Niveus_Requestproduct_IndexController extends Mage_Core_Controller_Front_Action {

    /**
     * index method for the controller
     */
    public function indexAction() {
        $this->loadLayout(array('default'));
        $this->renderLayout();
    }

    /**
     * This method save the requested new product
     * into the database 
     */
    public function saveRequestedProductAction() {

        $name = $this->getRequest()->getParam("yourname");
        $email = $this->getRequest()->getParam("youremail");
        $productname = $this->getRequest()->getParam("productname");
        $brand = $this->getRequest()->getParam("brand");
        $seenproduct = $this->getRequest()->getParam("seenproduct");
        $aboutproduct = $this->getRequest()->getParam("aboutproduct");

        try {
            $model = Mage::getModel('niveus_requestproduct/requestnewproduct');

            $model->setData(
                    array('name' => $name,
                        'email' => $email,
                        'productname' => $productname,
                        'brand' => $brand,
                        'seenproduct' => $seenproduct,
                        'aboutproduct' => $aboutproduct
            ))->save();

            $adminContent = '<div>
                          <div style="font-weight:bold;margin-bottom:5px;">Dear Admin,</div>
                          <div style="margin-bottom:10px;">You have a new product request</div>
                          <div style="background:#efeff4;border:1px solid #dcdcdc;">
                          <div style="font-weight:bold; margin:10px;">Details</div>
                          <ul><li style="list-style:none;">Name:' . $name . '</li></ul>
                          <ul><li style="list-style:none;">Email:' . $email . '</li></ul>
                          <ul><li style="list-style:none;">Productname:' . $productname . '</li></ul>
                          <ul><li style="list-style:none;">Brand:' . $brand . '</li></ul>
                          <ul><li style="list-style:none;">Where have you seen this product:' . $seenproduct . '</li></ul>
                          <ul><li style="list-style:none;">Tell us about the product:' . $aboutproduct . '</li></ul></div>
                          <div style="margin-top:10px;">Thank You.</div>
						 </div>';
            $adminSubject = "New Product Request";
            $adminEmail = Mage::getStoreConfig('trans_email/ident_general/email');
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From:' . $name . ' <' . $email . '>';
            mail($adminEmail, $adminSubject, $adminContent, $headers); //This will send mail to admin 
            Mage::getSingleton('core/session')->addSuccess('Proudct Requested Successfully.');
            $this->_redirect('requestproduct');
        } catch (Exception $e) {
            Mage::logException($e);
        }
    }
}

?>
