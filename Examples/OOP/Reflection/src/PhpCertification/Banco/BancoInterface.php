<?php

namespace PhpCertification\Banco;

use PhpCertification\Pessoa;

/**
 * Interface de Bancos
 */
interface BancoInterface
{

	/**
	 * Interface Define Correntista
	 */
	public function setCorrentista(Pessoa\Base $correntista);


	/**
	 * Interface Obter Correntista
	 * @return Pessoa\Base Correntista
	 */
	public function getCorrentista();

	
	/**
	 * Interface Obter Saldo
	 * @return float Saldo da Conta
	 */
	public function obterSaldo();

	
}