<?php
/**
* @copyright Niveus Solutoins.
*/
class Niveus_Requestproduct_Block_Adminhtml_Requestnewproduct_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
         
        // Set some defaults for our grid
        $this->setDefaultSort('id');
        $this->setId('niveus_requestproduct_requestnewproduct_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }
     
    protected function _getCollectionClass()
    {
        // This is the model we are using for the grid
        return 'niveus_requestproduct/requestnewproduct_collection';
    }
     
    protected function _prepareCollection()
    {
        // Get and set our collection for the grid
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);
         
        return parent::_prepareCollection();
    }
     
    protected function _prepareColumns()
    {
        // Add the columns that should appear in the grid
        $this->addColumn('id',
            array(
                'header'=> $this->__('ID'),
                'align' =>'right',
                'width' => '50px',
                'index' => 'id'
            )
        );
         
        $this->addColumn('name',
            array(
                'header'=> $this->__('Name'),
                'index' => 'name'
            )
        );
       $this->addColumn('email',
            array(
                'header'=> $this->__('Email'),
                'index' => 'email'
            )
        );
     $this->addColumn('productname',
            array(
                'header'=> $this->__('Product Name'),
                'index' => 'productname'
            )
        );
    $this->addColumn('brand',
            array(
                'header'=> $this->__('Brand'),
                'index' => 'brand'
            )
        );
   $this->addColumn('seenproduct',
            array(
                'header'=> $this->__('where have you seen this product'),
                'index' => 'seenproduct'
            )
        );
        $this->addColumn('aboutproduct',
            array(
                'header'=> $this->__('Tell us about this product'),
                'index' => 'aboutproduct'
            )
        );
        return parent::_prepareColumns();
    }
//massactions to magento grid 
protected function _prepareMassaction()
{
    $this->setMassactionIdField('requestproduct_Requestnewproduct_id');
    $this->getMassactionBlock()->setFormFieldName('id');
    $this->getMassactionBlock()->addItem('delete', array(
        'label'=> $this->__('Delete'),
        'url'  => $this->getUrl('*/*/massDelete', array('' => '')),  
        'confirm' => $this->__('Are you sure you want to delete the selected listing(s)?') 
    ));
    return $this;
}

     

    }
