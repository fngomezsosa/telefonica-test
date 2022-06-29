<?php

namespace Telefonica\Test\Model\ResourceModel\Empresa;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'empresa_id';

    protected $_eventPrefix = 'telefonica_test_empresa_collection';

    protected $_eventObject = 'empresa_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Telefonica\Test\Model\Empresa::class,
            \Telefonica\Test\Model\ResourceModel\Empresa::class);
    }
}
