<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, communityii, 2014 - 2015
 * @package communityii/yii2-common
 * @version 1.0.0
 *
 * @author derekisbusy https://github.com/derekisbusy
 * @author kartik-v https://github.com/kartik-v
 */

namespace comyii\common\traits;


/**
 * Class ArrayContainer the action settings for the module.
 * 
 * @package comyii\user\components
 */
trait ArrayContainer
{
    /**
     * @var array the layouts
     */
    public $container = [];
    
    public function mergeConfig($config = array()) {
        if (isset($config['container'])) {
            $config['container'] = array_replace_recursive($this->getDefaults(), $config['container']);
        } else {
            $config['container'] = $this->getDefaults();
        }
        return $config;
    }
    
    /**
     * Get the default actions
     * 
     * @return array
     */
    public function getDefaults()
    {
        return [];
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}