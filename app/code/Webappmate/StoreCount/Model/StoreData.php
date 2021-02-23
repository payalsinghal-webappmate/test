<?php 
namespace Webappmate\StoreCount\Model;
class StoreData extends \Magento\Framework\Model\AbstractModel{
	public function _construct(){
		$this->_init("Webappmate\StoreCount\Model\ResourceModel\StoreData");
	}
}
 ?>