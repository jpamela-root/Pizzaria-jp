<?php
   class Comanda{

   		private $codigo;
		private $datacompra;
		private $formapagamento;		
		private $status;
		
		private $funcionario; //esse atributo será para adicionar um objeto do tipo classe funcionario(), e não simplesmente o nome do funcionario, mas o objeto inteiro (essa é a forma mais coerente)
		private $pizza; //esse atributo será para adicionar um objeto do tipo classe pizza(), e não simplesmente o nome da pizza, mas o objeto inteiro (essa é a forma mais coerente)
		
		public function __construct($codigo=0, $datacompra="", $formapagamento="", $status="", $funcionario="", $pizza=""){
			$this->codigo = $codigo;	
			$this->datacompra = $datacompra;
			$this->formapagamento = $formapagamento;			
			$this->status = $status;
			$this->funcionario = $funcionario;
			$this->pizza = $pizza;
		}		
		
		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}
		
		public function getCodigo(){
			return $this->codigo;
		}
		
		public function setDataCompra($datacompra){
			$this->datacompra = $datacompra;
		}
		
		public function getDataCompra(){
			return $this->datacompra;
		}
		
		public function setFormaPagamento($formapagamento){
			$this->formapagamento = $formapagamento;
		}
		
		public function getFormaPagamento(){
			return $this->formapagamento;
		}		
		
		public function setStatus($status){
			$this->status = $status;
		}
		
		public function getStatus(){
			return $this->status;
		}
		
		public function setFuncionario($funcionario){
			$this->funcionario = $funcionario;
		}
		
		public function getFuncionario(){
			return $this->funcionario;
		}

		public function setPizza($pizza){
			$this->pizza = $pizza;
		}
		
		public function getPizza(){
			return $this->pizza;
		}
	
   }
?>