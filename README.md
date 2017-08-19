# RadioRasp PHP

A PHP Wrapper to easily interact with [RadioRasp](https://github.com/MatthieuMota/RadioRasp).

I start a workflow of home automation and I capitalize by putting all that on Github. These tools meet my needs above all and may not be suitable for generic use.

You need [RadioRasp](https://github.com/MatthieuMota/RadioRasp) to use it.

You can easily create a platform and remote control :

```php
require 'vendor/autoload.php';

use MatthieuMota\RadioRasp\RaspberryPi;
use MatthieuMota\RadioRasp\RemoteControl;

$rasp = new RaspberryPi();
$rasp->setRadioPin(10);
$remote1 = new RemoteControl(1); // This remote use a default platform based on Raspberry Pi 1
$remote1->addButton('A', 67108863);
$remote2 = new RemoteControl(2, $rasp); // You can use a specific Platform define before

$remote1->press('A', false);
$remote1->press('A');
```