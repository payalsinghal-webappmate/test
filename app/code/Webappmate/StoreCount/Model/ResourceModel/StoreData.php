<?php 
namespace Webappmate\StoreCount\Model\ResourceModel;
class StoreData extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{
 public function _construct(){
 $this->_init("webappmate_visitor_data","id");
 }
}
 ?>