<?php require_once('../Connections/Historial.php'); ?>
<?php
mysql_select_db($database_Historial, $Historial);
$query_Recordset1 = "SELECT Id_Paciente, Nombre, Apellido_paterno, Apellido_materno FROM ficha_de_identiicacion ORDER BY Apellido_paterno ASC";
$Recordset1 = mysql_query($query_Recordset1, $Historial) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<table width="854" border="1">
  <tr>
    <td width="181">Id_Paciente</td>
    <td width="158">Nombre</td>
    <td width="218">Apellido_paterno</td>
    <td width="197">Apellido_materno</td>
    <td width="66">&nbsp;</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['Id_Paciente']; ?></td>
      <td><?php echo $row_Recordset1['Nombre']; ?></td>
      <td><?php echo $row_Recordset1['Apellido_paterno']; ?></td>
      <td><?php echo $row_Recordset1['Apellido_materno']; ?></td>
      <td><form id="form1" name="form1" method="post" action="">
        <label>
          <select name="select" size="1">
            <option>historial</option>
            <option>kidfnd</option>
          </select>
          </label>
      </form>
      </td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
