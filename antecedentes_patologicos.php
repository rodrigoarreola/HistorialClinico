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
  $insertSQL = sprintf("INSERT INTO antecedentes_patologicos (Id_paciente, Enfermedades_padeci_actualidad, Enf_poadecidads_neotanal, Enf_exantemicas, Hubo_complicacion, internamiento_cirugia, Convulsiones_febriles, Hemotransfusiones, Alergias_medicamento, Alergias_alimentos) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Id_paciente'], "int"),
                       GetSQLValueString($_POST['Enfermedades_padeci_actualidad'], "text"),
                       GetSQLValueString($_POST['Enf_poadecidads_neotanal'], "text"),
                       GetSQLValueString($_POST['Enf_exantemicas'], "text"),
                       GetSQLValueString($_POST['Hubo_complicacion'], "text"),
                       GetSQLValueString($_POST['internamiento_cirugia'], "text"),
                       GetSQLValueString($_POST['Convulsiones_febriles'], "text"),
                       GetSQLValueString($_POST['Hemotransfusiones'], "text"),
                       GetSQLValueString($_POST['Alergias_medicamento'], "text"),
                       GetSQLValueString($_POST['Alergias_alimentos'], "text"));

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
      <td nowrap align="right">Id_paciente:</td>
      <td><input type="text" name="Id_paciente" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Enfermedades_padeci_actualidad:</td>
      <td><input type="text" name="Enfermedades_padeci_actualidad" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Enf_poadecidads_neotanal:</td>
      <td><input type="text" name="Enf_poadecidads_neotanal" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Enf_exantemicas:</td>
      <td><input type="text" name="Enf_exantemicas" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Hubo_complicacion:</td>
      <td><input type="text" name="Hubo_complicacion" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Internamiento_cirugia:</td>
      <td><input type="text" name="internamiento_cirugia" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Convulsiones_febriles:</td>
      <td><input type="text" name="Convulsiones_febriles" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Hemotransfusiones:</td>
      <td><input type="text" name="Hemotransfusiones" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Alergias_medicamento:</td>
      <td><input type="text" name="Alergias_medicamento" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Alergias_alimentos:</td>
      <td><input type="text" name="Alergias_alimentos" value="" size="32"></td>
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
