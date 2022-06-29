<?php

namespace Telefonica\Test\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Empresa extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'empresa';

    protected $_cacheTag = 'empresa';

    protected $_eventPrefix = 'empresa';

    protected function _construct()
    {
        $this->_init('Telefonica\Test\Model\ResourceModel\Empresa');
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
