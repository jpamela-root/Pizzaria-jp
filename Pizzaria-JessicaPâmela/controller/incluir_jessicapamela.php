<?php
   require_once '../persistence/dao_jessicapamela.php';
   
   $objeto = new NomeSobreNome();
   $objeto->setNome($_REQUEST['nome']);
   $objeto->setSobreNome($_REQUEST['sobrenome']);
   
   $dao = new DAONomeSobreNome();
   $dao->cadastrarNomeSobreNome($objeto); 
 	
	header('Location: ../view/view_jessicapamela.php');
	exit;
?>