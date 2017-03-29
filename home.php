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

if (isset($_POST['nombre'])) {
  $loginUsername=$_POST['nombre'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "nivel_acceso";
  $MM_redirectLoginSuccess = "index_medico.php";
  $MM_redirectLoginFailed = "home.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_Historial, $Historial);
  	
  $LoginRS__query=sprintf("SELECT Cedula_prof, passw, nivel_acceso FROM administrativo WHERE Cedula_prof='%s' AND passw='%s'",
  get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $Historial) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'nivel_acceso');
    
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Historial Clínico Electronico</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type='text/css' href="estilo2.css"/>
<script type="text/javascript" src="../jquery/external/jquery/jquery.js"> </script>
<script type="text/javascript" src="script.js"> </script>
</head>
<body>
	
	
<div id="content"> 
<div id='open_close'> Login</div>
	<form id='login'  name="form1" method="POST" action="<?php echo $loginFormAction; ?>" > 
	<label> Nombre: </label>
	<input name='nombre' type= 'text' id='nombre' />
	<label> Contraseña: </label>
	<input name="pass"  type= 'password' id='pass' />
	<input type="submit" name="Submit" value="Enviar" id="enviar"/>
  </form>

	<div id="back">
<!-- header -->
		<div id="header"> 
			<div id="menu">
			
				<ul>
				
					<li id="button1"><a href='home.php'  title="">Home</a></li>
					<li id="button2"><a href="#" title="">Blog</a> </li>
					<li id="button3"><a href="#" title="">Gallery</a></li>
					<li id="button4"><a href="#" title="">About</a></li>
					<li id="button5"><a href='contact.html' title="">Contact</a>
					</li>
				</ul>
				
			</div>
			
			<div id="logo">
				<h1><a href="#">Historial Clínico Electrónico</a></h1>
			</div>  
		</div>
		
<!-- / header -->
<!-- content -->
		<div id="main"><div class="inner_copy"><div class="inner_copy"> Need a website? <a href="http://www.websitetemplatesonline.com">Free website templates</a> by professional designers at WTO.</div></div>
			<div id="right">			
				<h3>Company News</h3>
				<ul>
					<li><h4>June 2, 2008</h4><p><a href="#">Duis tempor posuere diam. Suspendisse vel tellus quis nunc malesuada porta. &#8230;</a></p></li>
					<li><h4>June 12, 2008</h4><p><a href="#">Tempus Duis tempor posuere diam. Suspendisse vel tellus quis nunc malesuada porta. &#8230;</a></p></li>
					<li><h4>June 23, 2008</h4><p><a href="#">Tempus in, lacus. Duis tempor uspendisse vel tellus quis nunc malesuada porta. &#8230;</a></p></li>
					<li><h4>June 25, 2008</h4><p><a href="#">Tempus in, lacus. Duis tempor posuere diam. Suspendisse vel tellus quis nunc malesuada porta. &#8230;</a></p></li>
				</ul>
				<h3>Calendar</h3>
				<ul>
					<li id="calendar">			
						<div id="calendar1">
							<table id="calendar2" summary="Calendar">
								<thead>
									<tr><th abbr="Monday" scope="col" title="Monday">M</th><th abbr="Tuesday" scope="col" title="Tuesday">T</th><th abbr="Wednesday" scope="col" title="Wednesday">W</th><th abbr="Thursday" scope="col" title="Thursday">T</th><th abbr="Friday" scope="col" title="Friday">F</th><th abbr="Saturday" scope="col" title="Saturday">S</th><th abbr="Sunday" scope="col" title="Sunday">S</th></tr>
								</thead>
								<tfoot>
									<tr><td abbr="Des" colspan="3" id="prev"><a href="#">&laquo; Dec</a></td><td class="pad">&nbsp;</td><td abbr="Feb" colspan="3" id="next" class="pad"><a href="#">Feb &raquo;</a></td></tr>
								</tfoot>
								<tbody>
									<tr><td colspan="2" class="pad">&nbsp;</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
									<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
									<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
									<tr><td>20</td><td id="now">21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
									<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td class="pad" colspan="2">&nbsp;</td></tr>
								</tbody>
							</table>
						</div>
					</li>
				</ul>
				<h3>Lorem ipsum dolor</h3>
				<ul>
					<li><p class="bot">Vivamus sagittis bibendum erat. Curabitur lorem ipsum dolore malesuada. <a href="#">More...</a></p></li>
				</ul><br />
			</div>
			<div id="left">		
				<h2>¿Qué es un Historial Clínico Electronico?</h2><br />
			
				<p>
Se trata de la recopilación de información detallada y ordenada cronológicamente con relación a la salud de un paciente y la de su familia en un periodo determinado de su vida. Representa el cimiento para conocer las condiciones de salud, los aspectos médicos y los diferentes procedimientos que han sido solicitados y realizados por los profesionales de la salud a lo largo del proceso en el cual se solicitó asistencia médica.<br />-
				

			</div>
		</div>
<!-- / content -->
<!-- footer -->
		<div id="footer">
			<div class="fleft"><p>Copyright statement.</p></div>
			
		</div>
		
<!-- / footer -->
	</div>
</div>
</body>
</html>
