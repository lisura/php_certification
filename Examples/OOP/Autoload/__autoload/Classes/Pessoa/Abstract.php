<?php
class Pessoa_Abstract
{
    public function getQueSouEu()
    {
        // __CLASS__ vai retornar Pessoa_Abstract;
        return get_class($this);
    }
}
