<?php require_once('../Connections/Historial.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO abuelo_paterno (Id_Registro, Id_paciente, Tabaquismo, Alcholismo, Enfermedades, Alergias) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Id_Registro'], "int"),
                       GetSQLValueString($_POST['Id_paciente'], "int"),
                       GetSQLValueString($_POST['Tabaquismo'], "text"),
                       GetSQLValueString($_POST['Alcholismo'], "text"),
                       GetSQLValueString($_POST['Enfermedades'], "text"),
                       GetSQLValueString($_POST['Alergias'], "text"));

  mysql_select_db($database_Historial, $Historial);
  $Result1 = mysql_query($insertSQL, $Historial) or die(mysql_error());
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Id_Registro:</td>
      <td><input type="text" name="Id_Registro" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Id_paciente:</td>
      <td><input type="text" name="Id_paciente" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tabaquismo:</td>
      <td><input type="text" name="Tabaquismo" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Alcholismo:</td>
      <td><input type="text" name="Alcholismo" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Enfermedades:</td>
      <td><input type="text" name="Enfermedades" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Alergias:</td>
      <td><input type="text" name="Alergias" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>
