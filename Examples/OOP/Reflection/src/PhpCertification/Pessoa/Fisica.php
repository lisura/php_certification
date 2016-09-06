<?php

namespace PhpCertification\Pessoa;

/**
 * Repesenta uma Pessoa Fisica
 */
class Fisica extends Base
{

    private $cpf;

    /**
     * Define cpj.
     * @param string 999.999.999-99
     */
    public function setCPF($cpf)
    {
        $this->cpf = $this->getNumericos($cpf);
        return $this;
    }

}
