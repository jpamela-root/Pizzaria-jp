<?php
   require_once '../persistence/dao_pizza.php';
   
   $objetoDao = new DAOPizza();
   $objetoDao->removerPizza($_REQUEST['codigo']);
 	
	header('Location: ../view/view_pizza.php');
	exit;
?>