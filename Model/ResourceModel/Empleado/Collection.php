<?php

namespace Telefonica\Test\Model\ResourceModel\Empleado;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'empleado_id';

    protected $_eventPrefix = 'telefonica_test_empleado_collection';

    protected $_eventObject = 'empleado_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Telefonica\Test\Model\Empleado::class,
            \Telefonica\Test\Model\ResourceModel\Empleado::class);
    }
}
