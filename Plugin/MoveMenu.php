<?php
namespace Riverstone\Core\Plugin;

use Magento\Backend\Model\Menu\Builder\AbstractCommand;
use Riverstone\Core\Helper\AbstractData;

/**
 * Show the navigation menu only if is enabled in admin configuration
 */
class MoveMenu
{
    protected const RIVERSTONE_CORE = 'Riverstone_Core::menu';

    /**
     * @var AbstractData
     */
    protected $helper;

    /**
     * MoveMenu constructor.
     *
     * @param AbstractData $helper
     */
    public function __construct(AbstractData $helper)
    {
        $this->helper = $helper;
    }

    /**
     * AfterExecute method using plugin

     * @param AbstractCommand $subject
     * @param array $itemParams
     *
     * @return mixed
     */
    public function afterExecute(AbstractCommand $subject, $itemParams)
    {
        if ($this->helper->getMenuStatus()) {
            if (strpos($itemParams['id'], 'Riverstone_') !== false
                && isset($itemParams['parent'])
                && strpos($itemParams['parent'], 'Riverstone_') === false) {
                $itemParams['parent'] = self::RIVERSTONE_CORE;
            }
        } elseif ((isset($itemParams['id']) && $itemParams['id'] === self::RIVERSTONE_CORE)
                || (isset($itemParams['parent']) && $itemParams['parent'] === self::RIVERSTONE_CORE)) {
            $itemParams['removed'] = true;
        }

        return $itemParams;
    }
}
