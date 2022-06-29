<?php

namespace Telefonica\Test\Controller\Adminhtml\Empresa;

use Telefonica\Test\Controller\Adminhtml\Empresa;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Empresa
{
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('emppresa_id');
        $model = $this->_objectManager->create(
            \Telefonica\Test\Model\Empresa::class
        );
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Empresa no longer exists.'));
                /** @var Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('telefonica_test_empresa', $model);

        // 3. Build edit form
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Empresa') : __('New Empresa'),
            $id ? __('Edit Empresa') : __('New Empresa')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Empresa'));
        $resultPage->getConfig()->getTitle()->prepend(
            $model->getId() ? __('Edit '. $model->getCardDescription().' '.$model->getDescription()): __('New Empresa')
        );
        return $resultPage;
    }
}
