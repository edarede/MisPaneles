<?php
error_reporting( E_ALL ); 
ini_set( 'display_errors', 1);
include_once('includes/conecta.php');
$sql="SELECT * FROM edit_visitas_back order by id_nota";
$res=mysql_query($sql,$link);
echo "inicio, espere...";
while($fila1=mysql_fetch_assoc($res)){
    $idn=$fila1['id_nota'];    
    $vis=$fila1['visitas'];
    $vot=$fila1['votos'];
    $tov=$fila1['total_valoracion'];
    $imp=$fila1['impresiones'];
    $env=$fila1['envios'];
    $ide=$fila1['id_edicion'];
    $val=$fila1['valoracion'];
        
        $sql2="SELECT * FROM edit_visitas WHERE id_nota=".$idn;
        $res2=mysql_query($sql2,$link);
        if(!mysql_num_rows($res2)){
            $insert="INSERT INTO edit_visitas (id_nota,visitas,votos,total_valoracion,impresiones,envios,id_edicion,valoracion) 
                     VALUES($idn,$vis,$vot,$tov,$imp,$env,$ide,$val)";
             mysql_query($insert,$link);
             $salida++;
             echo $salida. "reg. [ ".$insert." ]<br><br>";
        }else{
            $update="UPDATE edit_visitas SET visitas=visitas+$vis, votos=votos+$vot, total_valoracion=total_valoracion+$tov, impresiones=impresiones+$imp, envios=envios+$env WHERE id_nota=$idn";
             mysql_query($update,$link);
             $salida++;
             echo $salida. "reg. [ ".$update." ]<br><br>";
        }
    
}
echo "se actualizaron ".$salida." registros.";


?>