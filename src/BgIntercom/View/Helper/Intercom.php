<?php

namespace BgIntercom\View\Helper;

use BgIntercom\Options\ModuleOptions;
use Zend\Authentication\AuthenticationService;
use Zend\View\Helper\AbstractHelper;

class Intercom extends AbstractHelper
{

    /**
     * @var ModuleOptions
     */
    protected $options;

    /**
     * @var AuthenticationService
     */
    protected $authService;

    public function __construct(ModuleOptions $options, AuthenticationService $authService)
    {
        $this->setOptions($options);
        $this->setAuthService($authService);
    }


    public function __invoke()
    {

        if (!$this->getOptions()->getAppId()) {
            return false;
        }

        if ($this->getAuthService()->hasIdentity()) {
            $user = $this->getAuthService()->getIdentity();
        } else {
            return false;
        }

        $intercomSettingsJson = json_encode(
            array(
                'app_id' => $this->getOptions()->getAppId(),
                'user_id' => $user->getId(),
                'name' => $user->getUsername(),
                'email' => $user->getEmail(),
            )
        );

        return <<<EOT
<script id="IntercomSettingsScriptTag">
  window.intercomSettings = $intercomSettingsJson;
</script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://api.intercom.io/api/js/library.js';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}};})()</script>
EOT;

    }

    /**
     * @param ModuleOptions $options
     */
    public function setOptions(ModuleOptions $options)
    {
        $this->options = $options;
    }

    /**
     * @return ModuleOptions
     */
    public function getOptions()
    {
        return $this->options;
    }


    /**
     * Get authService.
     *
     * @return AuthenticationService
     */
    public function getAuthService()
    {
        return $this->authService;
    }

    /**
     * Set authService.
     *
     * @param AuthenticationService $authService
     * @return \ZfcUser\View\Helper\ZfcUserIdentity
     */
    public function setAuthService(AuthenticationService $authService)
    {
        $this->authService = $authService;
        return $this;
    }


}
