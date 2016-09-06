<?php
namespace Pessoa;

abstract class Base
{
    public function getQueSouEu()
    {
        // __CLASS__ vai retornar Pessoa_Abstract;
        return get_class($this);
    }
}
