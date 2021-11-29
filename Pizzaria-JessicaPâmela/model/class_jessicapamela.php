<?php
   class NomeSobreNome{

   		private $codigo;
		private $nome;
		private $sobrenome;
		
		public function __construct($codigo=0, $nome="", $sobrenome=""){
			$this->codigo = $codigo;	
			$this->nome = $nome;
			$this->sobrenome = $sobrenome;			
		}		
		
		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}
		
		public function getCodigo(){
			return $this->codigo;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setSobreNome($sobrenome){
			$this->sobrenome = $sobrenome;
		}
		
		public function getSobreNome(){
			return $this->sobrenome;
		}	
   }
?>