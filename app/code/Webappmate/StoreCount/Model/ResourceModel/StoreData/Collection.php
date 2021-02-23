<?php 
namespace Webappmate\StoreCount\Model\ResourceModel\StoreData;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
	public function _construct(){
		$this->_init("Webappmate\StoreCount\Model\StoreData","Webappmate\StoreCount\Model\ResourceModel\StoreData");
	}
}
 ?>