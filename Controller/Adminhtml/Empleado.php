<?php
declare(strict_types=1);

namespace Telefonica\Test\Controller\Adminhtml;

use \Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Registry;

abstract class Empleado extends Action
{
    const ADMIN_RESOURCE = 'Magento_Sales::sales';

    protected $_coreRegistry;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Init page
     *
     * @param Page $resultPage
     * @return Page
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
        ->addBreadcrumb(__('Telefonica'), __('Telefonica'))
        ->addBreadcrumb(__('Empleado'), __('Empleado'));
        return $resultPage;
    }
}
