<?php

/**
 * @author DarioArede, para Telematica.com.ar
 * @copyright 2010
 * @DarioArede 
 * @Dia 2
 * @fecha 2/6/2010
 * @ $idusr    = $_SESSION['id_admin'];
 * @ $usr      = $_SESSION['nom_logueado'];
 * @ $ip       = $_SERVER['REMOTE_ADDR'] ;
 * @ $modulo   = "Alta de Nota";
 * @ $consulta = $query;	 
 */ 
 

include_once("includes/conecta.php");
if ($_SESSION['id_admin']==""){
	header("Location:login.php");
}
$consulta=str_replace("'","&rsquo;",$consulta);
$consulta=str_replace('"',"&quot;",$consulta);
$consulta=str_replace("(","<",$consulta);
$consulta=str_replace(")",">",$consulta);
$grabar="INSERT INTO sys_audit(id_usuario,usuario,ip,modulo,query) 
			VALUE(".$idusr.",'".$usr."','".$ip."','".$modulo."','".$consulta."')";
			//echo  $grabar;
$resultado=mysql_query($grabar,$link);



?>