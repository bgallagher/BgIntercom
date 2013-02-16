<?php

namespace BgIntercom\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{

    /**
     * @var String
     */
    protected $appId;

    /**
     * @param String $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    /**
     * @return String
     */
    public function getAppId()
    {
        return $this->appId;
    }

}