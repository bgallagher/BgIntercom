BgIntercom
==========

A ZF2 module to intergrate with [intercom.io](http://intercom.io)

###Requires:
[ZfcUser](https://github.com/ZF-Commons/ZfcUser)

###Instalation & Setup (using [composer](http://getcomposer.org)):
 1. Run `composer.phar require bgallagher/bgintercom:dev-master`.
 2. Add `BgIntercom` to your `application.config.php`.
 3. Copy the distributed config file from `vendor/bgallagher/BgIntercom/config/BgIntercom.config.php.dist` to `config/autoload/BgIntercom.config.php` and fill in your `app_id`.
 4. echo the view helper in your layout `<?= $this->intercom() ?>`

###NOTE:
Intercom.io requires a `created_at` field, however ZfcUser does not support this out of the box.

To overcome this, this module will:
 1. Check for a getter method for created_at (default: getCreatedAt()) on the User object, if found (assumes a DateTime object is returned) it will send this as the created_at timestamp. This obviously assumes that you have extended the ZfcUser User entity.
 2. Fallback to a default create_at datetime if the method is not found. 

Both the getter method name & fallback date are configurable - see BgIntercom.config.php.dist.

Get in touch and/or PR if this doesn't meet your needs.
