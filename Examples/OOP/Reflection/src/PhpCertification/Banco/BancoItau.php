<?php

namespace PhpCertification\Banco;

use PhpCertification\Pessoa;

/**
 * Final Class Banco Itaú
 */
final class BancoItau extends BancoBase implements BancoInterface
{

	/**
	 * @var array com banco de Clientes
	 */
	private $dbClientes;

	/**
	 * Definir Correntista
	 * @param Pessoa\Base $correntista Objeto de Pessoa
	 */
	public function setCorrentista(Pessoa\Base $correntista)
	{
		parent::setCorrentista($correntista);
	}

	/**
	 * Obter Correntista
	 * @return Pessoa\Base $correntista Obketo de Pessoa Correntista
	 */
	public function getCorrentista()
	{
		return parent::getCorrentista();
	}

	/**
	 * Obter Saldo de correntista
	 * @return float Saldo de Correntista
	 */
	public function obterSaldo()
	{
		$correntista = $this->getCorrentista();
		$contaCorrente = $correntista->getContaCorrente();

		$reflectionContaCorrente = new \ReflectionObject($contaCorrente);

		$interface_test = $reflectionContaCorrente->implementsInterface('PhpCertification\Pessoa\ContaInterface');
		if(!$interface_test){
			throw new \Exception('Erro de Implementação, interface[ContaInterface] é requerida');
		}

		$ag = $contaCorrente->getAg();
		$cc = $contaCorrente->getCc();

		$saldo = $this->getSaldoCliente($ag, $cc);

		$contaCorrente->setSaldo($saldo);

		return $saldo;
	}

	/**
	 * Obter Banco de dados de Cliente do Banco Itau
	 * @return array dados de contas
	 */
	private function getDadosClientes()
	{
		 return $this->dbClientes = array(
			'0393'.'491427' => 10000.01,
			'0393'.'491428' => 5000.01,
			'0393'.'491429' => 2500.01,
			'0393'.'491430' => 1000.01
		);
	}
	
	/**
	 * Obter Saldo de Conta da base de dados
	 *
	 * @param string $ag Número da agência
	 * @param string $cc Número da Conta Corrente
	 * @return float Saldo de Conta
	 */
	private function getSaldoCliente($ag = null, $cc = null)
	{
		$key = $ag . $cc;
		$db = $this->getDadosClientes();
		$saldo = ($db[$key]) ? $db[$key] : 0.0;
		return $saldo; 
	}
}