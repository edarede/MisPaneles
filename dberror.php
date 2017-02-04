<?php session_start();?>
<div align="center">
  <div id="login">	
    <div id="logo"><img src="images/tlogin_prohibido.gif" /> </div>
			<font color="#333333" face="Arial, Helvetica, sans-serif">
			 <p class="titErrMsg">Usted no puede acceder al Sistema, debido al siguiente error:</p>			
			 <h4 id="errMsg"><?php echo $_SESSION['_error'];?></h4>
			 <p><a href="index.php">Volver</a></p>
			</font>
  </div>
</div>  	

