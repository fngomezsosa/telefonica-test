<?php

namespace Telefonica\Test\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Empresa extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('empresa', 'empresa_id');
    }
}
