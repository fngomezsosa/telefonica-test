<?php

namespace Telefonica\Test\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Empleado extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'empleado';

    protected $_cacheTag = 'empleado';

    protected $_eventPrefix = 'empleado';

    protected function _construct()
    {
        $this->_init('Telefonica\Test\Model\ResourceModel\Empleado');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
