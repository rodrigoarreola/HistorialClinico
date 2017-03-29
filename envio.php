<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="prueba.php">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipo_Interrogatorio:</td>
      <td><input type="text" name="Tipo_Interrogatorio" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombre:</td>
      <td><input type="text" name="Nombre" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Apellido_paterno:</td>
      <td><input type="text" name="Apellido_paterno" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Apellido_materno:</td>
      <td><input type="text" name="Apellido_materno" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sexo:</td>
      <td><select name="Sexo">
          <option value="HOMBRE" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>HOMBRE</option>
          <option value="MUJER" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>MUJER</option>
        </select>
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Edad:</td>
      <td><input type="text" name="Edad" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fecha_nacimiento:</td>
      <td><input type="text" name="Fecha_nacimiento" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nacionalidad:</td>
      <td><input type="text" name="Nacionalidad" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Raza:</td>
      <td><input type="text" name="Raza" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Estado_civil:</td>
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
      <td nowrap="nowrap" align="right">Religion:</td>
      <td><input type="text" name="Religion" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lugar_residencia:</td>
      <td><input type="text" name="Lugar_residencia" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Domicilio_actual:</td>
      <td><input type="text" name="Domicilio_actual" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Telefono:</td>
      <td><input type="text" name="Telefono" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ocupacion:</td>
      <td><input type="text" name="Ocupacion" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Escolaridad:</td>
      <td><select name="Escolaridad" id="Escolaridad">
          <option value="Ninguno" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Ninguno</option>
          <option value="Primaria" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>Primaria</option>
          <option value="Secundaria" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>Secundaria</option>
          <option value="Carrera T&eacute;cnica o comercial" <?php if (!(strcmp(4, ""))) {echo "SELECTED";} ?>
		>Carrera T&eacute;cnica o comercial</option>
          <option value="Preoaratoria o bachillerato" <?php if (!(strcmp(5, ""))) {echo "SELECTED";} ?>
		>Preoaratoria o bachillerato</option>
          <option value="Licencitura" <?php if (!(strcmp(6, ""))) {echo "SELECTED";} ?>>Licenciatura</option>
          <option value="Posgrado" <?php if (!(strcmp(4, ""))) {echo "SELECTED";} ?>>Posgrado</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Persona_Responsable:</td>
      <td><input type="text" name="Persona_Responsable" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Direccion_Responsable:</td>
      <td><input type="text" name="Direccion_Responsable" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Medico_Responsable:</td>
      <td><input type="text" name="Medico_Responsable" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Responsable_Formulario:</td>
      <td><input type="text" name="Responsable_Formulario" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">No_Expediente:</td>
      <td><input type="text" name="No_Expediente" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cedula_identificacion_institucional:</td>
      <td><input type="text" name="Cedula_identificacion_institucional" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Razon_Social:</td>
      <td><input type="text" name="Razon_Social" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Firma_Responsable_a_cargo:</td>
      <td><input type="text" name="Firma_Responsable_a_cargo" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input name="submit" type="submit" value="Insertar registro" /></td>
    </tr>
  </table>
</form>
</body>
</html>
