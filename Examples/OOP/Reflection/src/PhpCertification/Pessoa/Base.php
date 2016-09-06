<?php
namespace PhpCertification\Pessoa;

/**
 * Clase Base abstrata
 */
abstract class Base
{
    protected $ag;

    protected $cc;

    protected $contaCorrente;


    /**
     * Obter Nome da classe em uso.
     */
    protected function getQueSouEu()
    {
        // __CLASS__ vai retornar Pessoa_Abstract;
        return get_class($this);
    }

    /**
     * Define agência.
     * @param int Número da agência
     */
    public function setAg($ag)
    {
        $this->ag = $this->getNumericos($ag);
        return $this;
    }

    /**
     * Define Conta.
     * @param int Número da conta
     */
    public function setCc($cc)
    {
        $this->cc = $this->getNumericos($cc);
        return $this;
    }

    /**
     * Obter agência.
     * @param int Número da agência
     */
    public function getAg()
    {
        return $this->ag;
    }

    /**
     * Obter Conta.
     * @param int Número da conta
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * Obter ContaCorrente
     * @return Pessoa\ContaCorrente Objeto de Conta Corrente
     */
    public function getContaCorrente()
    {
        if(!$this->contaCorrente instanceof ContaCorrente){
            $this->contaCorrente = new ContaCorrente();
            $this->contaCorrente->setAg($this->getAg());
            $this->contaCorrente->setCc($this->getCc());
        }

        return $this->contaCorrente;
    }


    /**
     * Obter Núméricos de uma string.
     * @param string String de Documentos.
     */
    protected function getNumericos($str)
    {
        return preg_replace('/\W/','', $str );
    }



}
