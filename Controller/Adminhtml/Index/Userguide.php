<?php
namespace Riverstone\Core\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

/**
 * Adding link for the userguide menu in admin navigation
 */
class Userguide extends Action
{
    /**
     * Authorization level of a basic admin session
     */
    public const ADMIN_RESOURCE = 'Riverstone_Core::userguide';

    /**
     * Controller execution file

     * @return ResponseInterface|ResultInterface|void
     */
    public function execute()
    {
        $this->_response->setRedirect(
            'https://www.riverstonetech.com/'
        );
    }

    /**
     * Is the user allowed to view the page.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
