<?php     
class Mage_Wall_Block_Adminhtml_Blacklist_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('rulesGrid');
		$this->setDefaultSort('blacklist_id');
		$this->setDefaultDir('DESC');
		$this->setSaveParametersInSession(true);
		$this->setUseAjax(true);
	}
	protected function _prepareCollection()
	{
		$orderId = (int) $this->getRequest()->getParam('id');
		if(empty($orderId)){
			$collection = Mage::getModel('wall/blacklist')->getCollection();
		}
		
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}
	protected function _prepareColumns()
	{
		$this->addColumn('blacklist_id', array(
			'header'    => Mage::helper('wall')->__('ID #'),
			'align'     => 'left',
			'index'     => 'blacklist_id',
        ));
        $this->addColumn('ip', array(
			'header'    => Mage::helper('wall')->__('IP Address'),
			'align'     => 'left',
			'index'     => 'ip',
        ));
        /*$this->addColumn('priority', array(
			'header'    => Mage::helper('wall')->__('Level'),
			'align'     => 'left',
			'index'     => 'priority',
        ));*/
		return parent::_prepareColumns();
	}
	
	public function getGridUrl()
	{
	  return $this->getUrl('*/*/grid', array('_current'=>true));
	}

	  public function getRowUrl($row)
	  { 
		  return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	  }
}