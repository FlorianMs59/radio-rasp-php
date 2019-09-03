# RadioRasp PHP

A PHP Wrapper to easily interact with [RadioRasp](https://github.com/MatthieuMota/RadioRasp).

I start a workflow of home automation and I capitalize by putting all that on Github. These tools meet my needs above all and may not be suitable for generic use.

You need [RadioRasp](https://github.com/MatthieuMota/RadioRasp) to use it.

You can easily create a platform and remote control :

```php
require 'vendor/autoload.php';

use MatthieuMota\RadioRasp\RaspberryPi;
use MatthieuMota\RadioRasp\RemoteControl;

$raspberrypi2 = new RaspberryPi();
$remote1 = new RemoteControl(67108863); // This remote use a default platform based on Raspberry Pi 1
$remote1->addButton('A', 0);
$remote2 = new RemoteControl(67108862, $raspberrypi2); // You can use a specific Platform define before

$remote1->press('A', false);
$remote1->press('A');
```
