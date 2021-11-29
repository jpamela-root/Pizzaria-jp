<?php
   require_once '../persistence/dao_pizza.php';

   $objeto = new Pizza();
   $objeto->setNome($_REQUEST['nome']);
   $objeto->setIngredientes($_REQUEST['ingredientes']);
   $objeto->setValor($_REQUEST['valor']);
   $objeto->setStatus($_REQUEST['status']);
   $objeto->setTipo($_REQUEST['tipo']);
   
   $daoP = new DAOPizza();
   $daoP->cadastrarPizza($objeto); 
 		header('Location: ../view/view_pizza.php');
	exit;
?>