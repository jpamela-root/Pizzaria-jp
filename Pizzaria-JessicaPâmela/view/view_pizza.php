
<!-- 	
	require_once '../persistence/dao_pizza.php';	
	$daoPizza = new DAOPizza();
	$listaPizza = $daoPizza->listarPizza();	
-->

<!DOCTYPE html>
<html lang="pt-br">
  <head>
         <title>Pizzaria  JP Delivery</title>
    <meta charset="utf-8">

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
            <li class="active"><a href="view_pizza.php">Pizzas</a></li>
            <li><a href="view_comanda.php">Comandas</a></li>
            <li><a href="view_funcionario.php">Funcionários</a></li>
            <li><a href="view_cargo.php">Cargos</a></li>
            <li><a href="view_JessicaPâmela.php">Jessica Pâmela</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav>
    
<div class="jumbotron" style="background-image:url('pizzaBanner.jpg'); color: #FFFFFF; background-size: 100%;">	
  	<div class="container">   		
		<h1>Pizzaria  JP Delivery</h1>
		<h2>Hoje é dia de Pizza</h2>
	</div>
</div> 


<div class="container">
	
	<form action="../controller/incluir_pizza.php" method="post">
		<fieldset>
	  		<legend>Nova Pizza</legend>
	
	  		<div class="form-group">
	    			<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
	  		</div>
	
	  		<div class="form-group">
	    			<input type="text" class="form-control" id="ingredientes" name="ingredientes" placeholder="Ingredientes">  
	  		</div>  	
	  		
	  		<div class="form-group">
	    			<input type="number" min="0" step="any" class="form-control" id="valor" name="valor" placeholder="Valor">  
	  		</div>
		  		
		  	<div class="form-group">	
	  			<label>Status</label>
			    <select name="status">
					  <option value="Disponível">Disponível</option>
					  <option value="Indisponível">Indisponível</option>  
					  
				</select>
			</div>
			
			<div class="form-group">	
		  			<label>Tipo</label>
				    <select name="tipo">
				    	<option value="salgada">salgada</option>
				    	<option value="doce">doce</option>
				    	<option value="fit">fit</option>
				    	<option value="vegetariana">vegetariana</option>
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
    		<h2 class="panel-title">Lista de Pizzas</h2>
 	 	</div><!-- fim .panel-heading -->
		
		<div class="panel-body">  
  			<table class="table table-hover">
  				<tr>
  						<th>Código</th>
  						<th>Nome</th>
  						<th>Ingredientes</th>
  						<th>Valor</th>
  						<th>Status</th>
  						<th>Tipo</th>
  						<th></th>
  				</tr>
  				<?php
  					while ($objetoPizza = array_shift($listaPizza)) {
  				?>	
    				<tr>
    					<td class="col-md-1"><?php echo $objetoPizza->getCodigo(); ?></td>
    					<td class="col-md-3"><?php echo $objetoPizza->getNome(); ?></td>
    					<td class="col-md-1"><?php echo $objetoPizza->getIngredientes(); ?></td>
    					<td class="col-md-1"><?php echo $objetoPizza->getValor(); ?></td>
    					<td class="col-md-1"><?php echo $objetoPizza->getStatus();?></td>
    					<td class="col-md-1"><?php echo $objetoPizza->getTipo();?></td>
    					<td class="col-md-1">
    						<a class="btn btn-danger" href="../controller/excluir_pizza.php?codigo=<?= $objetoPizza->getCodigo(); ?>" role="button">Excluir</a>  								
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