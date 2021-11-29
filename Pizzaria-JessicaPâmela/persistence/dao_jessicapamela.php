<?php
    require_once 'conexao.php';
	require_once '../model/class_jessicapamela.php'; 
	
	class DAONomeSobreNome{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
			 if($this->conexao->conectar() == false){
			 	 echo "Não conectou!" . mysql_error();	
			 }
			
		}	
		
		public function cadastrarNomeSobreNome(NomeSobreNome $nomesobrenome){
			$nome = $nomesobrenome->getNome();
			$sobrenome = $nomesobrenome->getSobreNome(); 

			$sql = "INSERT INTO jessicapamela (primeiroNome, ultimoNome) VALUES ('$nome', '$sobrenome')";
			$this->conexao->executarQuery($sql);
		}
		
		public function listarNomeSobreNome(){
			$listaNomeSobreNome = $this->conexao->executarQuery("SELECT * FROM jessicapamela");
			$arrayNomeSobreNome = array();
			
			while ($linhaNomeSobreNome = mysqli_fetch_array($listaNomeSobreNome)) {
				$NomeSobreNome = new NomeSobreNome($linhaNomeSobreNome['codigo'],$linhaNomeSobreNome['primeiroNome'],$linhaNomeSobreNome['ultimoNome']);
				array_push($arrayNomeSobreNome,$NomeSobreNome);
			}
			return $arrayNomeSobreNome;
		}
		
		public function removerNomeSobreNome($codigo){
			$sql = "DELETE FROM jessicapamela WHERE codigo = '$codigo'";
			$this->conexao->executarQuery($sql);
		}	
	}	
?>