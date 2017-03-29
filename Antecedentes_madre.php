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
  $insertSQL = sprintf("INSERT INTO antecedentes_madre (id_registro, Edad, Ecolaridad, Profesion, Sueldo, Aportacion_casa, Tabaquismo, Alcoholismo, Drogas, Gestas, Abortos, Cesareas, Metodo_planificacion, Enfermedades_actuales, Enfermedad_infancia, Alergias, Id_paciente) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_registro'], "int"),
                       GetSQLValueString($_POST['Edad'], "int"),
                       GetSQLValueString($_POST['Ecolaridad'], "text"),
                       GetSQLValueString($_POST['Profesion'], "text"),
                       GetSQLValueString($_POST['Sueldo'], "int"),
                       GetSQLValueString($_POST['Aportacion_casa'], "text"),
                       GetSQLValueString($_POST['Tabaquismo'], "text"),
                       GetSQLValueString($_POST['Alcoholismo'], "text"),
                       GetSQLValueString($_POST['Drogas'], "text"),
                       GetSQLValueString($_POST['Gestas'], "int"),
                       GetSQLValueString($_POST['Abortos'], "int"),
                       GetSQLValueString($_POST['Cesareas'], "int"),
                       GetSQLValueString($_POST['Metodo_planificacion'], "text"),
                       GetSQLValueString($_POST['Enfermedades_actuales'], "text"),
                       GetSQLValueString($_POST['Enfermedad_infancia'], "text"),
                       GetSQLValueString($_POST['Alergias'], "text"),
                       GetSQLValueString($_POST['Id_paciente'], "int"));

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
      <td nowrap align="right">Id_registro:</td>
      <td><input type="text" name="id_registro" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Edad:</td>
      <td><input type="text" name="Edad" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ecolaridad:</td>
      <td><input type="text" name="Ecolaridad" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Profesion:</td>
      <td><input type="text" name="Profesion" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Sueldo:</td>
      <td><input type="text" name="Sueldo" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Aportacion_casa:</td>
      <td><input type="text" name="Aportacion_casa" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tabaquismo:</td>
      <td><input type="text" name="Tabaquismo" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Alcoholismo:</td>
      <td><input type="text" name="Alcoholismo" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Drogas:</td>
      <td><input type="text" name="Drogas" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Gestas:</td>
      <td><input type="text" name="Gestas" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Abortos:</td>
      <td><input type="text" name="Abortos" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Cesareas:</td>
      <td><input type="text" name="Cesareas" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Metodo_planificacion:</td>
      <td><input type="text" name="Metodo_planificacion" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Enfermedades_actuales:</td>
      <td><input type="text" name="Enfermedades_actuales" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Enfermedad_infancia:</td>
      <td><input type="text" name="Enfermedad_infancia" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Alergias:</td>
      <td><input type="text" name="Alergias" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Id_paciente:</td>
      <td><input type="text" name="Id_paciente" value="" size="32"></td>
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
