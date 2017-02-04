<?php


ob_implicit_flush (true);

include_once("includes/conecta.php");	
	

$query="SELECT COUNT(n.id) As cant FROM edit_notas As n  WHERE (n.id_edicion='240')";
$res=mysql_query($query,$link);
$row=mysql_fetch_assoc($res);
echo "Total de registros: ".$row['cant']."<br><br>";

echo "Registros: <br> #############  Empieza: ".date('H:i:s.u')."<br><br>";



$query="SELECT n.id, trim(n.titulo) as titulo, n.id_seccion, n.id_subseccion, n.habilitado, n.posicion, n.orden, n.id_edicion, n.um, nv.visitas, n.fecha, n.comentario, n.link_titulo, n.id_empresa,n.mostrar_antetitulo, s.seccion
				FROM edit_notas As n 
				LEFT JOIN edit_visitas As nv ON n.id=nv.id_nota 
				LEFT JOIN edit_secciones As s ON n.id_seccion=s.id  WHERE (n.id_edicion='240')    ORDER BY n.id DESC LIMIT 0,100";
$res=mysql_query($query,$link);

//while($row=mysql_fetch_assoc($res)){
	//echo $row['id']." ".$row['titulo']." ".$row['id_seccion']." ".$row['seccion']." <br>";
	while ($row=mysql_fetch_assoc($res)){
			
			$arr[] = $row;
	        				
		}
	
		echo '({"total":"'.$cant.'","rows":'.json_encode($arr).'})';
//}


echo "<br><br>query: ".$query;
echo "#############  Fin: ".date('H:i:s.u');	

?>