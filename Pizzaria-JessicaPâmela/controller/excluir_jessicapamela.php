<?php

   require_once '../persistence/dao_jessicapamela.php';
   
   $objetoDao = new DAONomeSobreNome();
   $objetoDao->removerNomeSobreNome($_REQUEST['codigo']);
 	
	header('Location: ../view/view_jessicapamela.php');
	exit;
?>