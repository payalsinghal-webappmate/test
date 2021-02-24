<?php

namespace Webappmate\StoreCount\Observer;

class SwitchStore implements \Magento\Framework\Event\ObserverInterface
{
	protected $storeManager;
    protected $_helper;
    private $_objectManager;
    
    public function __construct(
    \Magento\Store\Model\StoreManagerInterface $storeManager,
    \Webappmate\StoreCount\Helper\Data $_helper,
    \Magento\Framework\ObjectManagerInterface $objectmanager
     ) {
    $this->storeManager = $storeManager;
    $this->_helper=$_helper;
    $this->_objectManager = $objectmanager;
    }

    public function execute(\Magento\Framework\Event\Observer $observer) {
    
        //query to fetch the data
        $resource = $this->_objectManager->get('Magento\Framework\App\ResourceConnection');
	    $connection = $resource->getConnection();
	    $tableName = $resource->getTableName('webappmate_visitor_data');
       // $remote = $this->_objectManager->get('Magento\Framework\HTTP\PhpEnvironment\RemoteAddress');
       // $ip = $remote->getRemoteAddress();
       // $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip)); 
        //$userCountry = $ipdat->geoplugin_countryName ; 
       // $userCity = $ipdat->geoplugin_city; 
        //$userTimezone = $ipdat->geoplugin_timezone;
        //$userDatetime = date('Y/m/d H:i:s');
        $storeId = $this->storeManager->getStore()->getId();
        $storeName =$this->storeManager->getStore()->getName();
        $sql = "Select * FROM " . $tableName." where store_id=".$storeId;
        $result = $connection->fetchAll($sql);
        $model = $this->_objectManager->create('Webappmate\StoreCount\Model\StoreData');
	    if(count($result)){
	        //$updateData = $model->load($result[0]['id']);
	        //$updateData->setCount($result[0]['count']+1);
	        //$updateData->save();
        $sql = "Update " . $tableName . " Set count = count+1 where store_id=".$storeId;
        $connection->query($sql);	 
        }else{
	    //$model->setUserIp($ip);
        //$model->setUserCountry($userCountry);
        //$model->setUserCity($userCity);
        //$model->setUserTimezone($userTimezone);
        //$model->setUserDatetime($userDatetime);
        $model->setStoreId($storeId);
        $model->setStoreName($storeName);
        $model->setCount(1);
        $model->save();
	    }
        
}
}