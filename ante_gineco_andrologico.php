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
  $insertSQL = sprintf("INSERT INTO ante_gineco_andrológicos (Id_paciente, Inicio_puberta, Aparición_caract_sex, Vello_púbico, Vello_axilar, Cambio_voz, Ensanchamiento_hombros, Desar_organos_sex_secundario, Cambios_afectivos, Conducta_sexual, Vida_sexual) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Id_paciente'], "text"),
                       GetSQLValueString($_POST['Inicio_puberta'], "text"),
                       GetSQLValueString($_POST['Aparicin_caract_sex'], "text"),
                       GetSQLValueString($_POST['Vello_pbico'], "text"),
                       GetSQLValueString($_POST['Vello_axilar'], "text"),
                       GetSQLValueString($_POST['Cambio_voz'], "text"),
                       GetSQLValueString($_POST['Ensanchamiento_hombros'], "text"),
                       GetSQLValueString($_POST['Desar_organos_sex_secundario'], "text"),
                       GetSQLValueString($_POST['Cambios_afectivos'], "text"),
                       GetSQLValueString($_POST['Conducta_sexual'], "text"),
                       GetSQLValueString($_POST['Vida_sexual'], "text"));

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
      <td nowrap align="right">Inicio_puberta:</td>
      <td><input type="text" name="Inicio_puberta" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Aparición_caract_sex:</td>
      <td><input type="text" name="Aparicin_caract_sex" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Vello_púbico:</td>
      <td><input type="text" name="Vello_pbico" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Vello_axilar:</td>
      <td><input type="text" name="Vello_axilar" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Cambio_voz:</td>
      <td><input type="text" name="Cambio_voz" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ensanchamiento_hombros:</td>
      <td><input type="text" name="Ensanchamiento_hombros" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Desar_organos_sex_secundario:</td>
      <td><input type="text" name="Desar_organos_sex_secundario" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Cambios_afectivos:</td>
      <td><input type="text" name="Cambios_afectivos" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Conducta_sexual:</td>
      <td><input type="text" name="Conducta_sexual" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Vida_sexual:</td>
      <td><input type="text" name="Vida_sexual" value="" size="32"></td>
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
