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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO antecedentes_padre (id_paciciente, Nombre_padre, Edad, Escolaridad, Profesion, sueldo, Aportacion_casa, Tabaquismo, Alcoholismo, Drogas, Enfermedad_actual, Enfermedad_infancia, Alergias, Id_registro) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_paciciente'], "int"),
                       GetSQLValueString($_POST['Nombre_padre'], "text"),
                       GetSQLValueString($_POST['Edad'], "int"),
                       GetSQLValueString($_POST['Escolaridad'], "text"),
                       GetSQLValueString($_POST['Profesion'], "text"),
                       GetSQLValueString($_POST['sueldo'], "int"),
                       GetSQLValueString($_POST['Aportacion_casa'], "text"),
                       GetSQLValueString($_POST['Tabaquismo'], "text"),
                       GetSQLValueString($_POST['Alcoholismo'], "text"),
                       GetSQLValueString($_POST['Drogas'], "text"),
                       GetSQLValueString($_POST['Enfermedad_actual'], "text"),
                       GetSQLValueString($_POST['Enfermedad_infancia'], "text"),
                       GetSQLValueString($_POST['Alergias'], "text"),
                       GetSQLValueString($_POST['Id_registro'], "int"));

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
<form method="post" name="form2" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Id_paciciente:</td>
      <td><input type="text" name="id_paciciente" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nombre_padre:</td>
      <td><input type="text" name="Nombre_padre" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Edad:</td>
      <td><input type="text" name="Edad" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Escolardiad:</td>
      <td><select name="Escolaridad" id="Escolaridad">
        <option value="Ninguno" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Ninguno</option>
        <option value="Primaria" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>Primaria</option>
		<option value="Secundaria" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>Secundaria</option>
		<option value="Carrera Técnica o comercial" <?php if (!(strcmp(4, ""))) {echo "SELECTED";} ?>
		>Carrera Técnica o comercial</option>
        <option value="Preoaratoria o bachillerato" <?php if (!(strcmp(5, ""))) {echo "SELECTED";} ?>
		>Preoaratoria o bachillerato</option>
		<option value="Licencitura" <?php if (!(strcmp(6, ""))) {echo "SELECTED";} ?>>Licenciatura</option>
		<option value="Posgrado" <?php if (!(strcmp(4, ""))) {echo "SELECTED";} ?>>Posgrado</option>
       
		
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Profesion:</td>
      <td><input type="text" name="Profesion" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Sueldo:</td>
      <td><input type="text" name="sueldo" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Aportacion_casa:</td>
      <td><input type="text" name="Aportacion_casa" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tabaquismo:</td>
      <td><select name="Tabaquismo" id="Tabaquismo">
        <option value="SI" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>SI</option>
		<option value="NO" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>NO</option>
        
       
		
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Alcoholismo:</td>
      <td><select name="Alcoholismo" id="Alcoholismo">
        <option value="SI" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>SI</option>
		<option value="NO" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>NO</option>
        
          </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Drogas:</td>
      <td><select name="Drogas" id="Drogas">
        <option value="SI" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>SI</option>
		<option value="NO" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>NO</option>
        
       
		
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Enfermedad_actual:</td>
      <td><input type="text" name="Enfermedad_actual" value="" size="32"></td>
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
      <td nowrap align="right">Id_registro:</td>
      <td><input type="text" name="Id_registro" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form2">
</form>
<p>&nbsp;</p>
</body>
</html>
