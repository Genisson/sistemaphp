<?php
	session_start();
	if(isset($_SESSION['nomeusu']))
	{
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Cadastro Pessoa</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">	
	<script src="js/metodos.js"></script>
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						<span class="sr-only">Ocultar Menu</span>	
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">Contatos</a>
				</div>
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<ul class="nav navbar-nav">
						<li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>							
						<li><a href="sair.php"><span class="glyphicon glyphicon-remove"></span>Sair</a></li>						
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php								
							echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> ".$_SESSION['nomeusu']."</a></li>";
						?>				      
				    </ul>			
				</div>
			</div>
		</nav>
	</header>

	<div class="container">
		<div class="row">	
	

	
				
			<a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Novo Contato</a><br><br>
			<table class='table'>
				<tr>
					<th>Id</th><th>Nome</th><th>Idade</th><th>Endereço</th><th><span class="glyphicon glyphicon-wrench"></span></th>
				</tr>			
<?php
			$mysqli = new mysqli("localhost", "root", "", "bdpessoa");		
			if ($mysqli->connect_errno) {
			    echo "Falha ao conectar no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT * FROM tbcontatos";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td>";	
					echo"<td>";						
				    echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-nome='" .$fila[1] ."' data-idade='" .$fila[2] ."' data-endereco='" .$fila[3] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
					echo "<a class='btn btn-danger' href='elimina.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
					echo "</td>";
					echo "</tr>";
				}
				$resultado->close();
			}
			$mysqli->close();			
			
	

?>
	        </table>
		</div> 



		<div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Novo Contato</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="inserir.php" method="GET">              		
                       		<div class="form-group">
                       			<label for="nome">Nome:</label>
                       			<input class="form-control" id="nome" name="nome" type="text" placeholder="Nome"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="idade">Idade:</label>
                       			<input class="form-control" id="idade" name="idade" type="text" placeholder="Idade"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="endereco">Endereço:</label>
                       			<input class="form-control" id="endereco" name="endereco" type="text" placeholder="Endereço"></input>
                       		</div>

							<input type="submit" name="salvar" class="btn btn-success" value="Salvar">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Sair</button>
                    </div>
                </div>
            </div>
        </div> 

        <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Contato</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="atualiza.php" method="POST">                       		
                       		        
                       		        <input  id="id" name="id" type="hidden" ></input>   		
		                       		<div class="form-group">
		                       			<label for="nome">Nome:</label>
		                       			<input class="form-control" id="nome" name="nome" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="idade">Idade:</label>
		                       			<input class="form-control" id="idade" name="idade" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="endereco">Endereço:</label>
		                       			<input class="form-control" id="endereco" name="endereco" type="text" ></input>
		                       		</div>

									<input type="submit" class="btn btn-success">							
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Sair</button>
                    </div>
                </div>
            </div>
        </div> 



	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>		
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('nome')
		  var recipient2 = button.data('idade')
		  var recipient3 = button.data('endereco')
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #nome').val(recipient1)
		  modal.find('.modal-body #idade').val(recipient2)
		  modal.find('.modal-body #endereco').val(recipient3)		 
		});
		
	</script>
	
</body>
</html>

<?php
	}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
		 <?php
	}
?>