<?php
	require_once '../persistence/dao_comanda.php';
	require_once '../persistence/dao_funcionario.php';
	require_once '../persistence/dao_pizza.php';
	
	$daoComanda = new DAOComanda();
	$listaComanda = $daoComanda->listarComanda();

	$daoFuncionario = new DAOFuncionario();
	$listaFuncionario = $daoFuncionario->listarFuncionarios();
	
	$daoPizza = new DAOPizza();
	$listaPizza = $daoPizza->listarPizzaDisponivel();
	
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Pizzaria JP Delivery</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>
  
  <body>
 	<nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          	<a class="navbar-brand" href="index.php">Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
           <li><a href="view_pizza.php">Pizzas</a></li>
            <li class="active"><a href="view_comanda.php">Comandas</a></li>
            <li><a href="view_funcionario.php">Funcionários</a></li>
            <li><a href="view_cargo.php">Cargos</a></li>
            <li><a href="view_JessicaPâmela.php">Jessica Pâmela</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav>
    
<div class="jumbotron" style="background-image:url('pizzaBanner.jpg'); color: #FFFFFF; background-size: 100%;">	
  	<div class="container">   		
		<h1>Pizzaria JP Delivery</h1>
		<h2>Hoje é dia de Pizza </h2>
	</div>
</div> 


<div class="container">
	
	<form action="../controller/incluir_comanda.php" method="post">
		<fieldset>
	  		<legend>Novo Comanda</legend>
			
			<label>Data da Compra</label>
		  		<div class="form-group">
		    			<input type="date" class="form-control" id="dataCompra" name="datacompra">  
		  		</div>

		  		<div class="form-group">		  				
			  		<label>Forma de Pagamento</label>
				    <select name="formapagamento">
						  <option value="À vista">À vista</option>
						  <option value="Débito">Débito</option>  
						  <option value="Crédito">Crédito</option>
						  <option value="Cheque">Cheque</option>
					</select>
				</div>

				<div class="form-group">
		  			<label>Status</label>
				    <select name="status">
						  <option value="Paga">Paga</option>
						  <option value="A pagar">A pagar</option>  
						  <option value="Cancelado">Cancelado</option>	 
					</select>
				</div>	
			
				<div class="form-group">	
		  			<label>Funcionario</label>
				    <select name="codigofuncionario">
				    	<?php
				    		while ($objetoFuncionario = array_shift($listaFuncionario)) {
				    	?>
						  <option value="<?php echo $objetoFuncionario->getCodigo(); ?>">  <?php echo $objetoFuncionario->getNome(); ?> </option>
						 <?php
						}
						 ?>
					</select>
				</div>

				<div class="form-group">	
		  			<label>Pizza</label>
				    <select name="codigopizza">
				    	<?php
				    		while ($objetoPizza = array_shift($listaPizza)) {
				    	?>
						  <option value="<?php echo $objetoPizza->getCodigo(); ?>">  <?php echo $objetoPizza->getNome(); ?>  </option>
						 <?php
						}
						 ?>
					</select>
				</div>
		  
	  		<button type="submit" class="btn btn-primary">
	  				<span class="glyphicon glyphicon-thumbs-up"></span>
	  				Cadastrar
			</button>
		</fieldset>  
	</form> 			
</div> <!-- fim .container 1 --> 

<div class="container">
 	<br /> <br /> 
</div> <!-- fim .container 2 -->
	
	
<div class="container">
  <div class="panel panel-default">
  		<div class="panel-heading">
    		<h2 class="panel-title">Lista de Comandas</h2>
 	 	</div><!-- fim .panel-heading -->
		
		<div class="panel-body">  
  			<table class="table table-hover">
  				<tr>
  						<th>Código</th>
  						<th>Data Compra</th>
  						<th>Forma de Pagamento</th>						
  						<th>Status</th>
  						<th>Funcionário</th>
  						<th>Pizza</th>
  						<th></th>
  				</tr>
  				<?php
  					while ($objetoComanda = array_shift($listaComanda)) {
  				?>	
    				<tr>
    					<td class="col-md-1"><?php echo $objetoComanda->getCodigo(); ?></td>
    					<td class="col-md-3"><?php echo date('d/m/Y',  strtotime($objetoComanda->getDataCompra())); ?></td>
    					<td class="col-md-1"><?php echo $objetoComanda->getFormaPagamento(); ?></td>			
    					<td class="col-md-1"><?php echo $objetoComanda->getStatus();?></td>
    					<td class="col-md-1"><?php echo $objetoComanda->getFuncionario()->getNome();?></td>
    					<td class="col-md-1"><?php echo $objetoComanda->getPizza()->getNome();?></td>
    					<td class="col-md-1">
    						<a class="btn btn-danger" href="../controller/excluir_comanda.php?codigo=<?= $objetoComanda->getCodigo(); ?>" role="button">Excluir</a>  								
    					</td>
    				</tr>
    			<?php
					}
    			?>
    				
    			</table>
    			
 		</div><!-- fim .panel-body -->
	</div><!-- fim .panel -->
</div><!-- fim .container 3 -->

    </body>
</html>