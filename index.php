<?php
include_once("./includes/conecta.php");
if ($_SESSION['id_admin']==""){
	header("Location:login.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel de control 3.0</title>
<link rel="stylesheet" type="text/css" href="ext-2.2/resources/css/ext-all.css" />
<script type="text/javascript" src="ext-2.2/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="ext-2.2/ext-all.js"></script>
<script type="text/javascript">
	Ext.BLANK_IMAGE_URL='ext-2.2/resources/images/default/s.gif';
	var MENSAJES_USR='&Uacute;ltima actualizaci&oacute;n de clave<br><b style="color: #E9594D;"><?php echo $_SESSION['fec_actualiza']; ?></b><br>Actualice su clave cada 30 d&iacute;as';
</script>
<!-- Cargar el plugin para los botones en un grid  -->
<link rel="stylesheet" type="text/css" href="css/Ext.ux.grid.RowActions.css" />
<script type="text/javascript" src="js/Ext.ux.grid.RowActions.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<link rel="stylesheet" type="text/css" href="ext-2.2/examples/layout-browser/layout-browser.css">
<link rel="stylesheet" type="text/css" href="css/style_ext.css" />

</head>
<body>
<!-- Top  -->
<div id="header">
  <h1>Panel de control</h1>
</div>
<!-- panel izq -->
<!--panel der  -->
<div style="display:none;">
  <div id="start-div">
    <div style="margin-left:100px;">
      <h2>Bienvenido al Panel de control</h2>
      <p>Le damos la bienvenida!</p>
      <p>Selecione una opci&oacute;n del panel izquierdo.</p>
    </div>
  </div>
  <div id="tablas_panel" ></div>
</div>
<!-- divisor  -->
</body>
</html>
