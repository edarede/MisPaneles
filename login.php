<?php
include_once("./includes/conecta.php");
$_SESSION['id_admin']="";
$_SESSION['nom_logueado'];
$req=new requestPost();


	if (isset($_POST['nombre']) && $_POST['nombre']<>"" && isset($_POST['existing1']) && $_POST['existing1']<>""){
		
		
		if ($_SESSION['tmptxt'] == $_POST['tmptxt']) {
			
			$nombre=$req->getVarString('nombre');
			$nombre=SecureSql($nombre);
			$contra=md5($req->getVarString('existing1'));
				
			$consulta = sprintf("SELECT * FROM sys_usuarios WHERE 1=1",comillas_inteligentes($nombre),comillas_inteligentes($contra));
		
			$res=mysql_query($consulta,$link);
			$pepe=mysql_num_rows($res);			
			if (mysql_num_rows($res)>0){
				$row=mysql_fetch_assoc($res);
				$_SESSION['id_admin']=$row['id'];
				$_SESSION['nom_logueado']=$row['nombre'];
				$_SESSION['id_perfil']=$row['id_perfil'];
				$_SESSION['fec_actualiza']=$row['modif'];				
				echo '<script language="Javascript">';
				echo "window.top.location='".$url_servidor."index.php';";
				echo '</script>';					
			}else{
				$_SESSION['_error']="Usuario o contrasea invalidos"; //.$nombre." - ".$contra." - ".$consulta;
			    	echo '<script language="Javascript">';
				echo "window.top.location='".$url_servidor."dberror.php';";
				echo '</script>';		
			}
		
		}else{
			$_SESSION['_error']="El c&oacute;digo de Verificaci&oacute;n ingresado es invalido";
			echo '<script language="Javascript">';
			echo "window.top.location='".$url_servidor."dberror.php';";
			echo '</script>';
		} 
			
	}
	
	
	


function comillas_inteligentes($valor)
{
    // Retirar las barras
    if (get_magic_quotes_gpc()) {
        $valor = stripslashes($valor);
    }
    // Colocar comillas si no es entero
    if (!is_numeric($valor)) {
        $valor = "'" . mysql_real_escape_string($valor) . "'";
    }
    return $valor;
}


?>

<script type="text/javascript" src="includes/teclado/keyboard.js" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="includes/teclado/keyboard.css">

<form action="login.php" method="POST">
	<table width="460" border="0" align="center" cellpadding="5" cellspacing="0" background="images/fondo_login.jpg">
        <tr>
          <td height="116" colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td height="40"><div align="right"><font color="#333333" face="Arial, Helvetica, sans-serif"><b><font size="2">Usuario:</font></b></font></div></td>
          <td><input type="text" name="nombre" maxlength="20"></td>
        </tr>
        <tr><br>
          <br>
          <br>
          <td height="41"><div align="right"><font color="#333333" face="Arial, Helvetica, sans-serif"><b><font size="2">Contrasea:</font></b></font></div></td>
          <td>		  	
		  	<input type="password" class="keyboardInput" id="existing1" name="existing1" value="" maxlength="20">
		  </td>
        </tr>
        <tr>
	    <td align="right" valign="top">
		
		</td>
	     <td valign="top">
			<img src="../include/captcha/captcha.php" width="100" height="30" vspace="3" align="absmiddle">
			<input name="tmptxt" type="text" size="6" maxlength="4" class="element text medium">
			<input type="submit" name="aceptar" value="Ingresar" class="form">
			<br>
		 </td>
	    </tr>
	    <tr>
	    	<td>
	    		&nbsp;
			</td>
	    </tr>

      </table>
</form>