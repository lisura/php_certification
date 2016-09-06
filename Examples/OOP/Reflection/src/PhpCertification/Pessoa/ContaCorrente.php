<?php
namespace PhpCertification\Pessoa;

/**
 * Clase Conta Corrente
 */
class ContaCorrente implements ContaInterface
{

	protected $ag;

    protected $cc;

    protected $saldo;

	/**
     * Define agência.
     * @param int Número da agência
     * @return Pessoa\ContaCorrente Objeto Conta Corrente
     */
    public function setAg($ag)
    {
        $this->ag = $ag;
        return $this;
    }

    /**
     * Define Conta.
     * @param int Número da conta
     * @return Pessoa\ContaCorrente Objeto Conta Corrente
     */
    public function setCc($cc)
    {
        $this->cc = $cc;
        return $this;
    }

    /**
     * Obter agência.
     * @return int Número da agência
     */
    public function getAg()
    {
        return $this->ag;
    }

    /**
     * Obter Conta.
     * @return int Número da Conta Corrente
     */
    public function getCc()
    {
        return $this->cc;
    }


    /**
     * Definção de Saldo
     * @param float Valor do Saldo
     * @return Pessoa\ContaCorrente
     */
	public function setSaldo($saldo)
	{
		$this->saldo = $saldo;
		return $this;
	}

    /**
     * Obter Valor Saldo
     * @return float Valor do Saldo
     */
	public function getSaldo()
	{
		return $this->saldo;
	}

}