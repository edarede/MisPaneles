<?php

include_once("./includes/conecta.php");

$idusr    = $_SESSION['id_admin'];
$usr      = $_SESSION['nom_logueado'];
$ip       = $_SERVER['REMOTE_ADDR'] ;

switch ($_POST['tarea']){
	
	case "borrar":
		$txt = str_replace("[","",$_POST['ids']);
		$txt = str_replace("]","",$txt);
		$txt = str_replace('"',"",$txt);
		$txt = str_replace("\\","",$txt);
		$idses = split(",",$txt);
		if (count($idses)==1){
			$query="DELETE FROM ".$_POST['tabla']." WHERE ".$_POST['campo_id']."='".$txt."'";			
		}
		else{
			for ($i=0;$i<count($idses);$i++){
				$filtro = $filtro.$_POST['campo_id']."='".$idses[$i]."'";
				if ($i < (count($idses)-1)){
					$filtro = $filtro." OR ";
				}
			}
			$query="DELETE FROM ".$_POST['tabla']." WHERE ".$filtro;
		}
		//echo $query;
		$res=mysql_query($query,$link);
		
			/***** AUDITAR ********** */
			$modulo   = "Borrar";
			$consulta = $query;	
			require_once('./auditar.php');
			/***** FIN AUDITAR ****** */		
		
		echo "1";			
		break;
		
	case "habilitar":
		$valor=0;
		if ($_POST['value']=="true"){
			$valor=1;
		}
		$tabla=$_POST['tabla'];
		$campo_id=$_POST['campo_id'];
		$campo=$_POST['campo'];
		$id=$_POST['id'];
		$query="UPDATE ".$tabla." SET ".$campo."='".$valor."' WHERE ".$campo_id."='".$id."'";
		$res=mysql_query($query,$link);
		echo "1";
		break;
	
}


?>