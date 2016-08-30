#!/bin/env php
<?php

class CidadesIbge{

	private $url;
	private $conteudoHtml;
	private $domdoc;
	private $totalCidades = 0;
	private $stored = array();
	private $arquivoSaida;

	public function __construct() {
		$this->url = "http://cidades.ibge.gov.br/xtras/home.php";
		$this->arquivoSaida = './insert_etados_cidades_ibge.sql';

		$this->obterEstados();
		$this->obterCidades();
		$this->formataGravaSaidaSQLInserts();	
                $this->formataGravaSaidaPHPArray();

		echo "Total de Cidades: {$this->totalCidades}".PHP_EOL;
	}

	private function obterEstados(){
		$domdoc = $this->getDomDoc($this->url);
		
		$menu_ufs = $domdoc->getElementById('menu_ufs');
		if(!$menu_ufs || !$menu_ufs->hasChildNodes()){
			throw new Exception('Elemento com id="menu_uf" não encontrado', 0);
		}

		$tag_ul = $menu_ufs->lastChild;
		foreach ($menu_ufs->childNodes as $node) {
			if(( $node instanceof DOMElement ) && $node->tagName == 'li'){
                                if($node->attributes){
                                   $uf_id = $node->attributes->getNamedItem("id")->nodeValue;
                                   $uf_id = str_replace('uf','', $uf_id);
                                }
				$tag_a = $node->lastChild;
				$uf = $tag_a->textContent;
                                $url = "http://cidades.ibge.gov.br/xtras/uf.php?";
				$urlParse = parse_url("http://www.ibge.gov.br". $tag_a->getAttribute('href'));
				
				$this->stored[$uf] = array(
					'url' => $url.$urlParse['query'],
					'id' => $uf_id
				);
			}
		}

		if(!count($this->stored))
			throw new Exception('Stored não foi preenchido com Estados(UF)', 0);
	

	}

	private function obterCidades(){
		foreach($this->stored as $uf => $dados){
			$domdoc = $this->getDomDoc($dados['url']);
                        $tag_nome_estado = $domdoc->getElementById('breadcrumb');
                        $this->stored[$uf]['nome'] = $tag_nome_estado->textContent;
                        
			$lista_municipios = $domdoc->getElementById('lista_municipios');
			if(!$lista_municipios || !$lista_municipios->hasChildNodes()){
				throw new Exception('Elemento com id="lista_municipios" não encontrado', 0);
			}

			$tag_ul = $lista_municipios->lastChild;
			foreach ($lista_municipios->childNodes as $node) {
				if(( $node instanceof DOMElement ) && $node->tagName == 'li'){
					if($node->attributes){
                                   		$cid_id = $node->attributes->getNamedItem("id")->nodeValue;
                                   		$cid_id = str_replace('m','', $cid_id);
                                	}
					$tag_a = $node->lastChild;
					$nome_cidade = $tag_a->textContent;	

					$this->stored[$uf]['cidades'][$cid_id] = $nome_cidade;
					$this->totalCidades++;
				}
			}
			
		}
	}

	private function formataGravaSaidaSQLInserts(){
		$arrayTofile = array();

		foreach($this->stored as $uf => $dados){
                       $insert = "INSERT INTO `cep.gpbe.17.01.2014`.`estado`(`id`,`nome`,`uf`) VALUES(%s, '%s', '%s')";
                       $arrayTofile[] = sprintf($insert, $dados['id'], $dados['nome'], $uf);
		}

                foreach($this->stored as $uf => $dados){
			foreach($dados['cidades'] as $id_cid => $cidade){
                                $insert = "INSERT INTO `cep.gpbe.17.01.2014`.`cidade`(`id`,`nome`,`id_estado`) VALUES(%s, '%s', '%s')";
				$arrayTofile[] = sprintf($insert, $id_cid, $cidade, $dados['id']);
			}
		}

		$dataFile = implode(";\n", $arrayTofile);

		$fo = fopen($this->arquivoSaida, 'w+');
		if (flock($fo, LOCK_EX)) {
			fwrite($fo, $dataFile);
			flock($fo, LOCK_UN);
		}
	}

        private function formataGravaSaidaPHPArray(){
                
        }

	private function getDomDoc($url){

		$aContext = array(
		    'http' => array(
		        'proxy' => 'tcp://172.20.30.201:3128',
		        'request_fulluri' => true,
		    ),
		);
		$cxContext = stream_context_create($aContext);

		$conteudo = file_get_contents($url,false, $cxContext);
		$this->url = $url;
		if ($conteudo === false) {
			throw new Exception('Erro ao consultar site', 0);
		}
		$this->conteudoHtml = $conteudo;
		$this->domdoc = new DOMDocument();
		$this->domdoc->recover = true;
		$this->domdoc->strictErrorChecking = false;
		@$this->domdoc->loadHTML($this->conteudoHtml);
		return $this->domdoc;
	}
	
}

try{
	new CidadesIbge();
} catch(Exception $e){
	print_r(array($e->getMessage(), $e->getLine()));
}
