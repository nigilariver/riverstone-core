<?php
namespace Riverstone\Core\Helper;

use Magento\Store\Model\ScopeInterface;

class AbstractData extends \Magento\Framework\App\Helper\AbstractHelper
{

    protected const XML_PATH_EXTENSION_STATUS = 'riverstonecore_section/general/enable';

    protected const XML_PATH_SHOW_MENU = 'riverstonecore_section/general/showmenu';
    
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Helper file to get admin configuration values and changing template files

     * @param Context $context
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    /**
     * Getting store id

     * @return int
     */
    public function getStoreId()
    {
        return $this->storeManager->getStore()->getId();
    }

    /**
     * Checking module status

     * @return int
     */
    public function getModuleStatus()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $moduleStatus = $this->scopeConfig->getValue(self::XML_PATH_EXTENSION_STATUS, $storeScope);
        return $moduleStatus;
    }

    /**
     * Checking module status

     * @return int
     */
    public function getMenuStatus()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $moduleStatus = $this->scopeConfig->getValue(self::XML_PATH_SHOW_MENU, $storeScope);
        return $moduleStatus;
    }

    // /**
    //  * Getting tracking url

    //  * @param string $carrierCode
    //  * @param int $trackingNumber
    //  * @return string
    //  */
    // public function getTrackingUrl($carrierCode, $trackingNumber)
    // {
    //     $trackApiData = $this->getTrackingAdminData();

    //     $trackUrl = '';

    //     foreach ($trackApiData as $trackData):
    //         if ($trackData['code'] == $carrierCode):
    //             $trackUrl = str_replace('$trackingnumber', $trackingNumber, $trackData['url']);
    //         endif;
    //     endforeach;

    //     return $trackUrl;
    // }
}
