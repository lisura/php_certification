<?php

namespace PhpCertification\Pessoa;

/**
 * Interface de Contas
 */
interface ContaInterface
{
	

	/**
     * Inteface de definicão agência.
     * @param int Número da agência
     */
    public function setAg($ag);
    

    /**
     * Interface de Definição Conta Corrente.
     * @param int Número da conta
     */
    public function setCc($cc);
   

    /**
     * Interface para Obter agência.
     * @return int Número da agência
     */
    public function getAg();

    /**
     * Interface para Obter Conta.
     * @return int Número da conta
     */
    public function getCc();

    /**
     * Interface de definção de Saldo
     * @param float Saldo da conta
     */
	public function setSaldo($saldo);

    /**
     * Interface de obter Saldo
     * @return float Saldo da conta
     */
	public function getSaldo();

}