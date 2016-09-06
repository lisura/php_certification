<?php

class Banco {

    private $ag;

    private $cc;

    public function __construct($ag = null, $cc = null)
    {
        $this->ag = $ag;
        $this->cc = $cc;
    }

    public function setAg($ag)
    {
        $this->ag = $ag;
        return $this;
    }

    public function setCc($cc)
    {
        $this->cc = $cc;
        return $this;
    }

    public function __toString()
    {
        return 'Ag: ' . $this->ag . ' Conta: ' . $this->cc;
    }
}
