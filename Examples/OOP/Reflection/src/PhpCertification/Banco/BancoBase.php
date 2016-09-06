<?php

namespace PhpCertification\Banco;

use PhpCertification\Pessoa;

/**
 * Abstract Classe de Bancos
 */
abstract class BancoBase {

	/**
	 * @var PhpCertification\Pessoa\Base com correntista
	 */
	protected $correntista;
	      
	/**
	 * 
	 */
	public function setCorrentista(Pessoa\Base $correntista)
	{
		$reflectionContaCorrente = new \ReflectionClass($correntista->getContaCorrente());

		$interface_test = $reflectionContaCorrente->implementsInterface('PhpCertification\Pessoa\ContaInterface');
		if(!$interface_test){
			throw new \Exception('Erro de Implementação, interface[ContaInterface] é requerida');
		}

		$this->correntista = $correntista;	

	}

	public function getCorrentista()
	{
		return $this->correntista;
	}

	public function obterSaldo()
	{
		$msg = '['.__METHOD__ .'] Deve ser Sobreescrito e definido em herança';
		error_log($msg);
		throw new \Exception($msg);
	}
}