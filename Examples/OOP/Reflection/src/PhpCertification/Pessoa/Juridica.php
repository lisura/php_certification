<?php

namespace PhpCertification\Pessoa;

/**
 * Repesenta uma Pessoa Juridica
 */
class Juridica extends Base
{

    private $cnpj;

    /**
     * Define CNPJ.
     * @param string 99.999.999/9999-99
     */
    public function setCNPJ($cnpj)
    {
        $this->cnpj = $this->getNumericos($cnpj);
        return $this;
    }
}
