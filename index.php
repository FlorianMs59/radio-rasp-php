<?php

require 'vendor/autoload.php';

use MatthieuMota\RadioRasp\RaspberryPi;
use MatthieuMota\RadioRasp\RemoteControl;

$raspberrypi1 = new RaspberryPi();
$remote1 = new RemoteControl(67108863);
$remote1->addButton('A', 0);
$remote2 = new RemoteControl(67108862);

$remote1->press('A', false);
$remote1->press('A');
