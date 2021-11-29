<?php
    require_once 'conexao.php';
    require_once '../model/class_comanda.php';
	require_once '../model/class_funcionario.php';
	require_once '../model/class_pizza.php';
	
	class DAOComanda{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	
		
		public function cadastrarComanda(Comanda $comanda, $codigoFuncionario, $codigoPizza){
			$dataCompra = $comanda->getDataCompra();
			$formaPagamento = $comanda->getFormaPagamento();
			$status = $comanda->getStatus();
			$codigoFuncionario = $codigoFuncionario;
			$codigoPizza = $codigoPizza;		

			$sql = "INSERT INTO comanda (dataCompra, formaPagamento, status, codigoFuncionario, codigoPizza) 
						 VALUES ('$dataCompra', '$formaPagamento','$status','$codigoFuncionario', '$codigoPizza')";
			$this->conexao->executarQuery($sql);
		}
		
		public function listarComanda(){
			$lista = $this->conexao->executarQuery("SELECT 				
				c.codigo as codigocomanda, 
				c.dataCompra, 
				c.formaPagamento,				
				c.status as statuscomanda,
				f.codigo as codigofuncionario, 
				f.nome as nomefuncionario, 
				f.cpf, 
				f.dataadmissao, 
				f.status as statusfuncionario,
				p.codigo as codigopizza, 
				p.nome as nomepizza, 
				p.ingredientes, 
				p.valor,
				p.status as statuspizza,
				p.tipo
					FROM 
					comanda c, 
					funcionario f,
					pizza p
			        WHERE f.codigo = c.codigofuncionario
			        AND p.codigo = c.codigoPizza");

			$arrayComandas = array();
			
			while ($linha = mysqli_fetch_array($lista)) {				
				$funcionario = new Funcionario($linha['codigofuncionario'],$linha['nomefuncionario'],$linha['cpf'],$linha['statuscomanda']); 
				$pizza = new Pizza($linha['codigopizza'],$linha['nomepizza'],$linha['ingredientes'],$linha['valor'],$linha['statuspizza'],$linha['tipo']); 
				$comanda = new Comanda($linha['codigocomanda'],$linha['dataCompra'],$linha['formaPagamento'],$linha['statuscomanda'], $funcionario, $pizza);				
				array_push($arrayComandas,$comanda);
			}
			return $arrayComandas;
		}
		
		public function removerComanda($codigo){
			$sql = "DELETE FROM comanda WHERE codigo = '$codigo'";
			$this->conexao->executarQuery($sql);
		}	
	}	
?>