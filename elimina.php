<?php

session_start();
if(isset($_SESSION['nomeusu']))
{
	$id = $_GET['id'];
	$mysqli = new mysqli("localhost", "root", "", "bdpessoa");		
	$sql = $mysqli->query("delete from tbcontatos where id='$id'");	
	echo "eliminado";
	echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";
	

}
else
	{
			echo "<script language='javascript'> alert('Não tem permissão'); </script>";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
	}		 

?>
     <SCRIPT LANGUAGE="javascript"> 
         alert("Contato Eliminado"); 
     </SCRIPT> 

	 
	 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">