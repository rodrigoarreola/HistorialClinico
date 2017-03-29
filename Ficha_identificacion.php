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
  $insertSQL = sprintf("INSERT INTO ficha_de_identiicacion (Id_Paciente, Tipo_Interrogatorio, Nombre, Apellido_paterno, Apellido_materno, Sexo, Edad, Fecha_nacimiento, Nacionalidad, Raza, Estado_civil, Religion, Lugar_residencia, Domicilio_actual, Telefono, Ocupacion, Escolaridad, Persona_Responsable, Direccion_Responsable, Medico_Responsable, Responsable_Formulario, No_Expediente, Cedula_identificacion_institucional, Fecha_elaboracion, Razon_Social, Firma_Responsable_a_cargo) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Id_Paciente'], "int"),
                       GetSQLValueString($_POST['Tipo_Interrogatorio'], "int"),
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['Apellido_paterno'], "text"),
                       GetSQLValueString($_POST['Apellido_materno'], "text"),
                       GetSQLValueString($_POST['Sexo'], "text"),
                       GetSQLValueString($_POST['Edad'], "text"),
                       GetSQLValueString($_POST['Fecha_nacimiento'], "date"),
                       GetSQLValueString($_POST['Nacionalidad'], "text"),
                       GetSQLValueString($_POST['Raza'], "text"),
                       GetSQLValueString($_POST['Estado_civil'], "text"),
                       GetSQLValueString($_POST['Religion'], "text"),
                       GetSQLValueString($_POST['Lugar_residencia'], "text"),
                       GetSQLValueString($_POST['Domicilio_actual'], "text"),
                       GetSQLValueString($_POST['Telefono'], "text"),
                       GetSQLValueString($_POST['Ocupacion'], "text"),
                       GetSQLValueString($_POST['Escolaridad'], "text"),
                       GetSQLValueString($_POST['Persona_Responsable'], "text"),
                       GetSQLValueString($_POST['Direccion_Responsable'], "text"),
                       GetSQLValueString($_POST['Medico_Responsable'], "text"),
                       GetSQLValueString($_POST['Responsable_Formulario'], "text"),
                       GetSQLValueString($_POST['No_Expediente'], "int"),
                       GetSQLValueString($_POST['Cedula_identificacion_institucional'], "int"),
                       GetSQLValueString($_POST['Fecha_elaboracion'], "date"),
                       GetSQLValueString($_POST['Razon_Social'], "text"),
                       GetSQLValueString($_POST['Firma_Responsable_a_cargo'], "int"));

  mysql_select_db($database_Historial, $Historial);
  $Result1 = mysql_query($insertSQL, $Historial) or die(mysql_error());

  $insertGoTo = "Antecedentes_padre.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery.ui.datepicker-es.js"></script>

<script>
$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
$("#datepicker").datepicker({
changeMonth: true,
changeYear: true,
yearRange: "1900:2050",
dateFormat: 'yy-mm-dd'
});
});
</script>
</head>

<body>
<form method="post" name="form1" action= "<?php echo $editFormAction; ?>" >
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Tipo_Interrogatorio:</td>
      <td><input type="text" name="Tipo_Interrogatorio" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nombre:</td>
      <td><input type="text" name="Nombre" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Apellido_paterno:</td>
      <td><input type="text" name="Apellido_paterno" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Apellido_materno:</td>
      <td><input type="text" name="Apellido_materno" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Sexo:</td>
      <td><select name="Sexo">
        <option value="HOMBRE" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>HOMBRE</option>
        <option value="MUJER" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>MUJER</option>
      </select>
	  
		  </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Edad:</td>
      <td><input type="text" name="Edad" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Fecha_nacimiento:</td>
      <td><input type="text" id="datepicker" name="Fecha_nacimiento" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nacionalidad:</td>
      <td><input type="text" name="Nacionalidad" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Raza:</td>
      <td><input type="text" name="Raza" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Estado_civil:</td>
      <td><select name="Estado_civil" id="Estado_civil">
        <option value="Soltero" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Soltero/a</option>
        <option value="Comprometido" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>Comprometido/a</option>
		<option value="Casado" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>Casado/a</option>
		<option value="Divorciado" <?php if (!(strcmp(4, ""))) {echo "SELECTED";} ?>>Divorciado/a</option>
        <option value="Viudo" <?php if (!(strcmp(5, ""))) {echo "SELECTED";} ?>>Viudo/a</option>
		
      </select>
	  
	  </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Religion:</td>
      <td><input type="text" name="Religion" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Lugar_residencia:</td>
      <td><input type="text" name="Lugar_residencia" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Domicilio_actual:</td>
      <td><input type="text" name="Domicilio_actual" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Telefono:</td>
      <td><input type="text" name="Telefono" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ocupacion:</td>
      <td><input type="text" name="Ocupacion" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Escolaridad:</td>
      <td>  <select name="Escolaridad" id="Escolaridad">
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
      <td nowrap align="right">Persona_Responsable:</td>
      <td><input type="text" name="Persona_Responsable" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Direccion_Responsable:</td>
      <td><input type="text" name="Direccion_Responsable" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Medico_Responsable:</td>
      <td><input type="text" name="Medico_Responsable" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Responsable_Formulario:</td>
      <td><input type="text" name="Responsable_Formulario" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">No_Expediente:</td>
      <td><input type="text" name="No_Expediente" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Cedula_identificacion_institucional:</td>
      <td><input type="text" name="Cedula_identificacion_institucional" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Razon_Social:</td>
      <td><input type="text" name="Razon_Social" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Firma_Responsable_a_cargo:</td>
      <td><input type="text" name="Firma_Responsable_a_cargo" value="" size="32" required ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="Id_Paciente" value="">
  <input type="hidden" name="Fecha_elaboracion" value="<?php setlocale(LC_TIME, 'es_MX.UTF-8');
date_default_timezone_set ('America/Cancun');
echo ''.strftime("%Y-%m-%d %H-%M-%S", time ());

?>">
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>
