<?php

namespace Telefonica\Test\Controller\Adminhtml\Empleado;

use Telefonica\Test\Controller\Adminhtml\Empleado;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;

class Delete extends Empleado
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
        $id = $this->getRequest()->getParam('empleado_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(
                    \Telefonica\Test\Model\Empleado::class
                );
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Empleado.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['empleado_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Empleado to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
