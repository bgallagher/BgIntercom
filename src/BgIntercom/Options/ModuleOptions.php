<?php

namespace BgIntercom\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{

    /**
     * @var string
     */
    protected $appId;

    /**
     * @var string
     */
    protected $fallbackCreatedAtTimeStamp = '1234567890';

    /**
     * @var string
     */
    protected $createdAtGetterMethod = 'getCreatedAt';

    /**
     * @var string
     */
    protected $userHash;

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

    /**
     * @param string $createdAtGetterMethod
     */
    public function setCreatedAtGetterMethod($createdAtGetterMethod)
    {
        $this->createdAtGetterMethod = $createdAtGetterMethod;
    }

    /**
     * @return string
     */
    public function getCreatedAtGetterMethod()
    {
        return $this->createdAtGetterMethod;
    }

    /**
     * @param string $fallbackCreatedAtTimeStamp
     */
    public function setFallbackCreatedAtTimeStamp($fallbackCreatedAtTimeStamp)
    {
        $this->fallbackCreatedAtTimeStamp = $fallbackCreatedAtTimeStamp;
    }

    /**
     * @return string
     */
    public function getFallbackCreatedAtTimeStamp()
    {
        return $this->fallbackCreatedAtTimeStamp;
    }

    /**
     * @param string $userHash
     */
    public function setUserHash($userHash)
    {
        $this->userHash = $userHash;
    }

    /**
     * @return string
     */
    public function getUserHash()
    {
        return $this->userHash;
    }

}