<?php

namespace MatthieuMota\RadioRasp;

class RemoteControl
{
    private $identifier;
    private $platform;
    private $buttons = [];

    public function __construct($identifier, Platform $platform = NULL)
    {
        $this->identifier = $identifier;
        $this->setPlatform($platform);
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function setIdentifier($identifier)
    {
        if ($identifier < 0 || $identifier > 14) {
            throw new \Exception('Le numéro de la télécommande doit être situé entre 0 et 14.');
        }

        $this->identifier = $identifier;
    }

    public function setPlatform(Platform $platform = NULL)
    {
        if (!isset($platform)) {
            $platform = new RaspberryPi();
            $platform->setRadioPin(0);
        }

        $this->platform = $platform;
    }

    public function addButton($name, $value)
    {
        $binary = decbin($value);
        if (strlen($binary) > 26) {
            throw new \Exception('La valeur du bouton doit être située entre 0 et 67 108 863.');
        }
        $this->buttons[$name] = $value;

        return $this;
    }

    public function press($name, $state = true)
    {
        if (!isset($this->buttons[$name])) {
            throw new \Exception('Ce bouton n\'existe pas');
        }

        $this->platform->send(
            $this->getIdentifier(),
            $this->buttons[$name],
            $state
        );
    }
}