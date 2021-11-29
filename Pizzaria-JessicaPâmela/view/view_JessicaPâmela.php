<?php
	require_once '../persistence/dao_josemenezes.php';
	$daoNomeSobreNome = new DAONomeSobreNome();
	$listaNomeSobreNome = $daoNomeSobreNome->listarNomeSobreNome();
	
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Pizzaria JP Delivery </title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

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
            <li><a href="view_comanda.php">Comandas</a></li>
            <li><a href="view_funcionario.php">Funcionários</a></li>
            <li><a href="view_cargo.php">Cargos</a></li>
            <li class="active"><a href="view_JessicaPâmela.php">Jessica Pâmela</a></li>
            
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav>
    
<div class="jumbotron" style="background-image:url('pizzaBanner.jpg'); color: #FFFFFF; background-size: 100%;">	
  	<div class="container">   		
		<h1>Pizzaria JP Delivery</h1>
		<h2>Hoje é dia de Pizza</h2>
	</div>
</div> 


<div class="container">
	
	<form action="../controller/incluir_josemenezes.php" method="post">
		<fieldset>
	  		<legend>Nome Completo</legend>
	
	  		<div class="form-group">
	    			<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu Nome">
	  		</div>
	
	  		<div class="form-group">
	    			<input type="text" class="form-control" id="descricao" name="sobrenome" placeholder="Digite seu Sobrenome">  
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
    		<h2 class="panel-title">Lista de Plagios</h2>
 	 	</div><!-- fim .panel-heading -->
		
		<div class="panel-body">  
  			<table class="table table-hover">
  				<tr>
  						<th>Código</th>
  						<th>Nome</th>
  						<th>Sobrenome</th>  						
  						<th></th>
  				</tr>
  				<?php
  					while ($objetoNomeSobreNome = array_shift($listaNomeSobreNome)) {
  				?>	
    				<tr>
    					<td class="col-md-1"><?php echo $objetoNomeSobreNome->getCodigo(); ?></td>
    					<td class="col-md-3"><?php echo $objetoNomeSobreNome->getNome(); ?></td>
    					<td class="col-md-1"><?php echo $objetoNomeSobreNome->getSobreNome(); ?></td>    					
    					<td class="col-md-1">
    						<a class="btn btn-danger" href="../controller/excluir_josemenezes.php?codigo=<?= $objetoNomeSobreNome->getCodigo(); ?>" role="button">Excluir</a>  								
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