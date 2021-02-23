<?php
namespace Webappmate\StoreCount\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    protected $storeDataFactory;
    
    public function __construct(
    \Magento\Framework\App\Helper\Context $context,
    \Webappmate\StoreCount\Model\ResourceModel\StoreData\CollectionFactory $storeDataFactory,
    array $data = []
)
{    
    $this->storeDataFactory = $storeDataFactory;

    parent::__construct($context);
}

    public function getName(){
        return "Payal";
    }
    
    public function getVisitorCollection(){
        $collection = $this->storeDataFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(6);
        return $collection;
    }
}
