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
  $insertSQL = sprintf("INSERT INTO paciente (id, nombre, apepat, apemat, edad, telefono, ciudad, status) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apepat'], "text"),
                       GetSQLValueString($_POST['apemat'], "text"),
                       GetSQLValueString($_POST['edad'], "int"),
                       GetSQLValueString($_POST['telefono'], "int"),
                       GetSQLValueString($_POST['ciudad'], "text"),
                       GetSQLValueString($_POST['status'], "text"));

  mysql_select_db($database_Historial, $Historial);
  $Result1 = mysql_query($insertSQL, $Historial) or die(mysql_error());

  $insertGoTo = "registro_paciente.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_Historial, $Historial);
$query_Recordset1 = "SELECT * FROM paciente";
$Recordset1 = mysql_query($query_Recordset1, $Historial) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
function mostrar(){
document.getElementById('tabla2').style.display = 'block';}
</script>
<script src="jquery-3.2.0.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<form method="post" name="form2" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Nombre:</td>
      <td><input type="text" id="nombre" name="nombre" value="" size="32" required></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Apepat:</td>
      <td><input type="text" id="apaterno" name="apepat" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Apemat:</td>
      <td><input type="text" id="amaterno" name="apemat" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Edad:</td>
      <td><input type="text" id="edad" name="edad" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Telefono:</td>
      <td><input type="text" id="telefono" name="telefono" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ciudad:</td>
      <td><input type="text" id="ciudad" name="ciudad" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Status:</td>
      <td><input type="text" id="status" name="status" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro" onclick="mostrar();"></td>
    </tr>
  </table>
  <input type="hidden" name="id" value="">
  <input type="hidden" name="MM_insert" value="form2">
  <div id="mostrar">
	
  </div>
</form>
<form id="form1" id="" name="form1" method="post" action="">
  <table id="tabla2" width="auto" border="1"  style="display: none;"  >
    <tr>
      <td width="100">id</td>
      <td width="135">nombre</td>
      <td width="130">apepat</td>
      <td width="133">apemat</td>
      <td width="119">edad</td>
      <td width="137">telefono</td>
      <td width="129">ciudad</td>
      <td width="123">status</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset1['id']; ?></td>
        <td><?php echo $row_Recordset1['nombre']; ?></td>
        <td><?php echo $row_Recordset1['apepat']; ?></td>
        <td><?php echo $row_Recordset1['apemat']; ?></td>
        <td><?php echo $row_Recordset1['edad']; ?></td>
        <td><?php echo $row_Recordset1['telefono']; ?></td>
        <td><?php echo $row_Recordset1['ciudad']; ?></td>
        <td><?php echo $row_Recordset1['status']; ?></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
