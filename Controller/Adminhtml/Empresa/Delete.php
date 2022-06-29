<?php

namespace Telefonica\Test\Controller\Adminhtml\Empresa;

use Telefonica\Test\Controller\Adminhtml\Empresa;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;

class Delete extends Empresa
{
    /**
     * Delete action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('empresa_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(
                    \Telefonica\Test\Model\Empresa::class
                );
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Empresa.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['empresa_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Empresa to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
