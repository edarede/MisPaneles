<?php
include_once("./includes/conecta.php");

include_once("./includes/conecta.php");
if ($_SESSION['id_admin']==""){
	header("Location:login.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Movimientos - Audit</title>
<style type="text/css">
<!--
.style7 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.texto {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
-->
</style>
</head>

<body>
<table width="90%" border="0" cellpadding="0" cellspacing="0" background="images/bg.jpg">
  <tr background="images/row-over.gif">
    <td width="20%" height="23"><span class="style7">Fecha</span></td>
    <td width="24%"><span class="style7">Usuario</span></td>
    <td width="10%"><span class="style7">Ip</span></td>
    <td width="24%"><span class="style7">M&oacute;dulo</span></td>
    <td width="22%"><span class="style7">Accion en la Base de Datos</span></td>
  </tr>
  
  <?php  	
  	$query="SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') as fechita FROM sys_audit ORDER BY fecha DESC, id DESC";			
	$res=mysql_query($query,$link);
	if(mysql_num_rows($res)){
		while($row=mysql_fetch_assoc($res)){
  ?>  
  <tr>
    <td><span class="texto"><?php echo $row['fechita']; ?></span></td>
    <td><span class="texto"><?php echo $row['usuario']; ?></span></td>
    <td><span class="texto"><?php echo $row['ip']; ?></span></td>
    <td><span class="texto"><?php echo $row['modulo']; ?></span></td>
    <td><span class="texto"><?php echo $row['query']; ?></span></td>
  </tr>
    <tr>
    <td colspan="5"><hr size="1"></td>    
  </tr>
  
  <?php
  		}
  }		
  ?>
  
</table>
</body>
</html>
