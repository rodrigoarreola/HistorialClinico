<?php require_once('../Connections/Historial.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['passw'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "Ficha_identificacion.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_Historial, $Historial);
  
  $LoginRS__query=sprintf("SELECT Cedula_prof, Contraseña FROM medico WHERE Cedula_prof='%s' AND Contraseña='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $Historial) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
  <p>Cedula profesional:
    <label>
    <input name="usuario" type="text" id="usuario" />
    </label>
  </p>
  <p>&nbsp;</p>
  <p>Contrase&ntilde;a:
<label>
    <input name="passw" type="password" id="passw" />
    </label>
  </p>
  <p>
    <label>
    <input type="submit" name="Submit" value="Enviar" />
    </label>
  </p>
</form>
</body>
</html>
