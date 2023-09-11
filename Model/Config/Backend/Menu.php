<?php
namespace Riverstone\Core\Model\Config\Backend;

use Magento\Config\Model\ResourceModel\Config\Data;
use Magento\Framework\App\Cache\Type\Block;
use Magento\Framework\App\Cache\Type\Config;
use Magento\Framework\App\Config\Value;

/**
 * Menu file used to update whenever the value changed
 */
class Menu extends Value
{
    /**
     * @var string
     */
    protected $_resourceName = Data::class;

    /**
     * Aftersave function
     *
     * @return parent
     */
    public function afterSave()
    {
        if ($this->isValueChanged()) {
            $this->cacheTypeList->cleanType(Block::TYPE_IDENTIFIER);
            $this->cacheTypeList->cleanType(Config::TYPE_IDENTIFIER);
        }

        return parent::afterSave();
    }
}
