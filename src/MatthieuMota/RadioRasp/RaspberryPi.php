<?php

namespace MatthieuMota\RadioRasp;

class RaspberryPi implements Platform
{
    const RADIORASP = '/usr/local/bin/radiorasp';

    private $bin = self::RADIORASP;
    private $pin = 0;

    public function getBin()
    {
        return $this->bin;
    }

    public function getPin()
    {
        return $this->pin;
    }

    public function setRadioPin($pin)
    {
        $this->pin = $pin;
    }

    public function send($remote, $value, $state)
    {
        if (!$this->checkBinIsInstalled()) {
            throw new \Exception($this->getBin() . ' n\'a pas l\'air installé.');
        }

        $state = ($state) ? 'on' : 'off';
        echo $this->getBin() . ' ' . $this->getPin() . ' ' . $value . ' ' . $remote . ' ' . $state . PHP_EOL;
    }

    private function checkBinIsInstalled()
    {
        return is_executable($this->getBin());
    }
}