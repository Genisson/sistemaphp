<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Cadastro de Usuários</title>
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
					<a href="#" class="navbar-brand">Cadastro de Usuários</a>
				</div>
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<ul class="nav navbar-nav">
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>							
						<li><a href="sair.php"><span class="glyphicon glyphicon-remove"></span>Sair</a></li>						
					</ul>
					<ul class="nav navbar-nav navbar-right">
					
					
					
					<?php								
							
						?>				      
				    </ul>			
				</div>
			</div>
		</nav>
	</header>

	<div class="container">
		<div class="row">	
	

	
				
			<a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Novo Usuário</a><br><br>
			<table class='table'>
				<tr>
					<th>Id</th><th>Login</th><th>Senha</th><th>Nome</th><th>Perfil</th><th><span class="glyphicon glyphicon-wrench"></span></th>
				</tr>			
<?php
			$mysqli = new mysqli("localhost", "root", "", "bdpessoa");		
			if ($mysqli->connect_errno) {
			    echo "Falha ao conectar no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT * FROM tbusuario";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td>";	
					echo"<td>";						
				    echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-login='" .$fila[1] ."' data-pass='" .$fila[2] ."' data-nome='" .$fila[3] ."' data-perfil='" .$fila[4] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
					echo "<a class='btn btn-danger' href='elimina_usu.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
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
                        <h4>Novo Usuário</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="inserir_usu.php" method="GET">              		
                       		<div class="form-group">
                       			<label for="login">Login:</label>
                       			<input class="form-control" id="login" name="login" type="text" placeholder="login"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="pass">Senha:</label>
                       			<input class="form-control" id="pass" name="pass" type="text" placeholder="senha"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nome">Nome:</label>
                       			<input class="form-control" id="nome" name="nome" type="text" placeholder="nome"></input>
                       		</div>
							<div class="form-group">
                       			<label for="perfil">Perfil:</label>
                       			<input class="form-control" id="perfil" name="perfil" type="text" placeholder="perfil"></input>
								
								</div>
								
								<div class="form-group">
                       			<label for="perfil">Ativo:</label>
                       			<input class="form-control" id="ativo" name="ativo" type="text" placeholder="ativo"></input>
								
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
                        <button type="button"   class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Usuário</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="atualiza.php" method="POST">                       		
                       		        
                       		        <input  id="id" name="id" type="hidden" ></input>   		
		                       		<div class="form-group">
		                       			<label for="login">Login:</label>
		                       			<input class="form-control" id="nome" name="nome" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="pass">Senha:</label>
		                       			<input class="form-control" id="pass" name="pass" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="pass">Nome:</label>
		                       			<input class="form-control" id="nome" name="nome" type="text" ></input>
		                       		</div>
									
									<div class="form-group">
                       			<label for="perfil">Perfil:</label>
                       			<input class="form-control" id="perfil" name="perfil" type="text" placeholder="perfil"></input>
								
								</div>

									<input type="submit" name="enviar" class="btn btn-success" >	
									
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
		  var button = $(event.relatedTarget) 
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('login')
		  var recipient2 = button.data('pass')
		  var recipient3 = button.data('nome')
		  var recipient4 = button.data('perfil')
		 
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #login').val(recipient1)
		  modal.find('.modal-body #pass').val(recipient2)
		  modal.find('.modal-body #nome').val(recipient3)
          modal.find('.modal-body #perfil').val(recipient4)			  
		});
		
	</script>
	
					
					
</body>
</html>