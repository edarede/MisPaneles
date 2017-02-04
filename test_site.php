<?php
		include_once("./includes/conecta.php");
		require_once('./generadores/generarSitemap.php');		
		if(!generarSitemap(484) ){
		  echo "Error";
		}

?>