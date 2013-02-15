BgIntercom
==========

A ZF2 module to intergrate with [intercom.io](http://intercom.io)

###Requires
[ZfcUser](https://github.com/ZF-Commons/ZfcUser)

###Instalation & Setup (using [Composer](http://getcomposer.org))
 1. Run `composer.phar require bgallagher/bgintercom:dev-master`.
 2. Add `BgIntercom` to your `application.config.php`.
 3. Copy the distributed config file from `vendor/bgallagher/BgIntercom/config/BgIntercom.config.php.dist` to `config/autoload/BgIntercom.config.php` and fill in your `app_id`.
 4. echo the view helper in your layout `<?= $this->intercom() ?>`
