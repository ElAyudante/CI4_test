<html> 
<head> 
<title> [ &Aacute;rea de Administraci&oacute;n ] </title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<link rel="stylesheet" href="css/estilos.css" type="text/css"> 
</head> 
<body> 
<div id="superior"> 
  <div id="logo"><img src="images/logo.jpg" width="161" height="40"></div> 
</div> 
<div id="menu"><div id="menu"> 
	<ul id="navi">	
		<li><a href="selec_menu.php?m=1" class="menu">Usuarios</a></li>		<li><a href="selec_menu.php?m=2" class="menu">Colegiados</a></li> 
        <li><a href="selec_menu.php?m=3" class="menu">Eventos</a></li> 
        <li><a href="selec_menu.php?m=4" class="menu">Documentos</a></li> 
        <li><a href="selec_menu.php?m=5" class="menu">Reclamaciones</a></li> 
        <li><a href="selec_menu.php?m=7" class="menu">Empleo</a></li> 
        <li><a href="selec_menu.php?m=6" class="menu">Cobros</a></li> 
		<li><a href="nosession.php">Desconectar</a></li> 
	</ul> 
    <div class="clear"></div> 
</div></div> 
<div id="main"> 
<!-- *******************************************************--> 
<div id="menu_lat"> 
<ul id="m_lateral"> 
	<li><a href="lista_operaciones.php">Operaciones TPV</a></li> 
    <li><a href="alta_cuota.php">Alta Cuota colegiados</a></li> 
    <li><a href="eliminar_cuota.php">Eliminar cuota</a></li>   
    <li><a href="estado_cuota.php">Estado Cuota colegiados</a></li>    
</ul></div> 
<!-- *******************************************************--> 
<!-- *******************************************************--> 
<div id="cont_2"> 
<h1>Estado de cuotas de colegiado</h1> 
    <?php 
			// VALIDAR FORMULARIO
			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar'])) {
				
				echo "hola";
			}
			else {		
							
				
					
	?>
    <table width="700" style="border:none" cellpadding="0" cellspacing="0"> 
      <tr> 
        <td width="225">&nbsp;</td> 
        <td>&nbsp;</td> 
      </tr>       
      <tr> 
        <td colspan="2"> 
      <form name='cuota_colegiado' method='post' action='estado_cuota3.php'> 
<input name='couta' value='8' type='hidden'> 
<input type='hidden' value='148' name='numero_colegiados'>
<table width='700' style='border:none' cellpadding='0' cellspacing='0'> 
<tr bgcolor='#CCCCCC'> 
<td width='450' height='30'>&nbsp;</td> 
<td align='center'>&nbsp;</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Abraldes Vidal, Susana</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota1' value='1' checked> 
 
					<input name='colegiado1' value='60' type='hidden'> 
 
					</td> 
</tr> 

<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Abraldes Vidal, Susana</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota1' value='1' checked> 
 
					<input name='colegiado1' value='60' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Agudo Leguina, M� Angeles</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota2' value='1' checked> 
 
					<input name='colegiado2' value='16' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Aguirre Trueba, Mar�a del Coro</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota3' value='1' checked> 
 
					<input name='colegiado3' value='126' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Alas-Pumari�o Sela, Isabel de las</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota4' value='1' checked> 
 
					<input name='colegiado4' value='88' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Arg�ello Villelga, Yolanda</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota5' value='1' checked> 
 
					<input name='colegiado5' value='63' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Aurrecoechea Mariscal, Elena</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota6' value='1' checked> 
 
					<input name='colegiado6' value='65' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Balza Rivero, Zahara</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota7' value='1' checked> 
 
					<input name='colegiado7' value='146' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Ba�uelos Cuesta, Eva</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota8' value='1' checked> 
 
					<input name='colegiado8' value='85' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Blanco Mara�on, Jos� Gabriel</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota9' value='1' checked> 
 
					<input name='colegiado9' value='163' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Buenaga D�az, Irene</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota10' value='1' checked> 
 
					<input name='colegiado10' value='56' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Calasanz S�nchez, Nuria Esperanza</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota11' value='1' checked> 
 
					<input name='colegiado11' value='106' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Callao Lasmar�as, Rosa Mar�a</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota12' value='1' checked> 
 
					<input name='colegiado12' value='42' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Casquero Cabreros, Maria</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota13' value='1' checked> 
 
					<input name='colegiado13' value='37' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Casta�o Bueno, Jos� Domingo</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota14' value='1' checked> 
 
					<input name='colegiado14' value='101' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Castellote Pav�a, Mar�a Milagro</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota15' value='1' checked> 
 
					<input name='colegiado15' value='66' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Castillo Jim�nez, Mar�a Sagrario del</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota16' value='1' checked> 
 
					<input name='colegiado16' value='59' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Ceballos Alonso, Francisco</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota17' value='1' checked> 
 
					<input name='colegiado17' value='67' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Climent Aguilar, Ester</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota18' value='1' checked> 
 
					<input name='colegiado18' value='75' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Cobo Aizpeolea, Laura</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota19' value='1' checked> 
 
					<input name='colegiado19' value='147' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Conde Prados, Javier</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota20' value='1' checked> 
 
					<input name='colegiado20' value='124' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Conejo Valverde, Miren Josune</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota21' value='1' checked> 
 
					<input name='colegiado21' value='161' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Cortavitarte Camara, Mireya</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota22' value='1' checked> 
 
					<input name='colegiado22' value='149' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Cort�s Vigo, Alfonso</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota23' value='1' checked> 
 
					<input name='colegiado23' value='2' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Cuartas Andr�s, M� Luisa</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota24' value='1' checked> 
 
					<input name='colegiado24' value='36' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Cubero Butrague�o, Irene</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota25' value='1' checked> 
 
					<input name='colegiado25' value='142' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Cupeiro S�nchez, Elena</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota26' value='1' checked> 
 
					<input name='colegiado26' value='69' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;De la Mata Mozo, M�nica</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota27' value='1' checked> 
 
					<input name='colegiado27' value='153' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Domarco Dominguez, Laura</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota28' value='1' checked> 
 
					<input name='colegiado28' value='160' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Domingo Trueba, Maria</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota29' value='1' checked> 
 
					<input name='colegiado29' value='150' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Dom�nguez Men�ndez, Mar�a Sol</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota30' value='1' checked> 
 
					<input name='colegiado30' value='95' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Echevarr�a Mart�nez, Laura</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota31' value='1' checked> 
 
					<input name='colegiado31' value='148' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Escobal Sarazibar, Leire</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota32' value='1' checked> 
 
					<input name='colegiado32' value='73' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Escribano Dur�n, Olga Mar�a</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota33' value='1' checked> 
 
					<input name='colegiado33' value='71' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Ezquerra Diego, Angela</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota34' value='1' checked> 
 
					<input name='colegiado34' value='165' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Fern�ndez �lvarez, Montserrat</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota35' value='1' checked> 
 
					<input name='colegiado35' value='114' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Fern�ndez Fern�ndez, Blanca</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota36' value='1' checked> 
 
					<input name='colegiado36' value='32' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Fern�ndez Lejarza, June</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota37' value='1' checked> 
 
					<input name='colegiado37' value='162' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Fern�ndez Marina, M�nica</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota38' value='1' checked> 
 
					<input name='colegiado38' value='48' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Fern�ndez Mart�n, Silvia</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota39' value='1' checked> 
 
					<input name='colegiado39' value='107' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Fern�ndez Missiego, Eva</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota40' value='1' checked> 
 
					<input name='colegiado40' value='35' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Fern�ndez Rodr�guez, Mar�a �ngeles</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota41' value='1' checked> 
 
					<input name='colegiado41' value='90' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Fern�ndez-Victorio Alonso, Laura</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota42' value='1' checked> 
 
					<input name='colegiado42' value='168' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Flores S�nchez, Mar�a Jes�s</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota43' value='1' checked> 
 
					<input name='colegiado43' value='103' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Franco Dom�nguez, M� Jes�s</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota44' value='1' checked> 
 
					<input name='colegiado44' value='169' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Frutos Robledo, Jes�s Mar�a de</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota45' value='1' checked> 
 
					<input name='colegiado45' value='52' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Gallego Ballesteros, Cristina Bel�n</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota46' value='1' checked> 
 
					<input name='colegiado46' value='68' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Garc�a Cabeza, Raquel</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota47' value='1' checked> 
 
					<input name='colegiado47' value='84' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Garc�a Garc�a, Cristina</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota48' value='1' checked> 
 
					<input name='colegiado48' value='130' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Garc�a Garc�a, Mar�a Bego�a Manuela</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota49' value='1' checked> 
 
					<input name='colegiado49' value='92' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Garc�a Gonz�lez, Eva</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota50' value='1' checked> 
 
					<input name='colegiado50' value='155' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Garc�a Gonz�lez, Mar�a Bego�a</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota51' value='1' checked> 
 
					<input name='colegiado51' value='57' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Garc�a Luque, Juan</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota52' value='1' checked> 
 
					<input name='colegiado52' value='96' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Garc�a Molina, Cecilia</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota53' value='1' checked> 
 
					<input name='colegiado53' value='120' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;G�mez Aparicio, Elia</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota54' value='1' checked> 
 
					<input name='colegiado54' value='30' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;G�mez L�pez, Encarnaci�n</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota55' value='1' checked> 
 
					<input name='colegiado55' value='98' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;G�ngora Escudero, Manuela Francisca</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota56' value='1' checked> 
 
					<input name='colegiado56' value='127' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Gonz�lez Alonso, Elena</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota57' value='1' checked> 
 
					<input name='colegiado57' value='145' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Gonz�lez Crespo, Bianka</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota58' value='1' checked> 
 
					<input name='colegiado58' value='159' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Gonz�lez Fern�ndez, M� Jos�</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota59' value='1' checked> 
 
					<input name='colegiado59' value='14' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Gonz�lez Moreno, Josefina</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota60' value='1' checked> 
 
					<input name='colegiado60' value='128' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Gonz�lez Pescador, Blanca</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota61' value='1' checked> 
 
					<input name='colegiado61' value='74' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Gonz�lez Ruiz, Mar�a de las Mercedes</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota62' value='1' checked> 
 
					<input name='colegiado62' value='38' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Gonz�lez Soto, Mariana</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota63' value='1' checked> 
 
					<input name='colegiado63' value='46' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Gorostiaga Ripoll, Saioa</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota64' value='1' checked> 
 
					<input name='colegiado64' value='139' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Grande Garc�a, Cristina</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota65' value='1' checked> 
 
					<input name='colegiado65' value='167' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Guerrero Salado, Est�baliz</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota66' value='1' checked> 
 
					<input name='colegiado66' value='82' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Guisandez G�mez, Miguel Angel</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota67' value='1' checked> 
 
					<input name='colegiado67' value='34' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Hermoso Cano, Mar�a Josefa</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota68' value='1' checked> 
 
					<input name='colegiado68' value='76' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Hern�ndez Ramos, Jes�s Manuel</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota69' value='1' checked> 
 
					<input name='colegiado69' value='54' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Higuera de La Calle, Mar�a Concepci�n</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota70' value='1' checked> 
 
					<input name='colegiado70' value='44' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Id�goras Garitaonandia, Miren Olatz</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota71' value='1' checked> 
 
					<input name='colegiado71' value='61' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Irazabal Juez, Jos� Luis</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota72' value='1' checked> 
 
					<input name='colegiado72' value='112' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Iturri Villanueva, Mar�a Teresa</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota73' value='1' checked> 
 
					<input name='colegiado73' value='45' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Lac�rcel Naval�n, Mar�a del Carmen</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota74' value='1' checked> 
 
					<input name='colegiado74' value='105' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Ladebauche Garriga, James Francisco</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota75' value='1' checked> 
 
					<input name='colegiado75' value='70' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Larena Cabrera, Mar�a del Mar</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota76' value='1' checked> 
 
					<input name='colegiado76' value='93' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Lope Mateo, Mar�a Amaya</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota77' value='1' checked> 
 
					<input name='colegiado77' value='78' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;L�pez Mej�as, Andr�s Jes�s</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota78' value='1' checked> 
 
					<input name='colegiado78' value='80' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;L�pez Mu�oz, Ana Isabel</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota79' value='1' checked> 
 
					<input name='colegiado79' value='62' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Lubi�n del Arco, Paul</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota80' value='1' checked> 
 
					<input name='colegiado80' value='131' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Mart� Estelles, Vicenta</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota81' value='1' checked> 
 
					<input name='colegiado81' value='113' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Mart�n Alonso, Aroa Bego�a</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota82' value='1' checked> 
 
					<input name='colegiado82' value='29' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Mart�nez Mancebo, Isabel</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota83' value='1' checked> 
 
					<input name='colegiado83' value='58' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Mart�nez Rey, Juan �ngel</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota84' value='1' checked> 
 
					<input name='colegiado84' value='53' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Merino G�mez de Lara, Soledad Itziar</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota85' value='1' checked> 
 
					<input name='colegiado85' value='136' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;M�guez V�zquez, Carlos</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota86' value='1' checked> 
 
					<input name='colegiado86' value='111' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Moreno Gonz�lez, Luis Fernando</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota87' value='1' checked> 
 
					<input name='colegiado87' value='39' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Moreno Maz�n, Miriam</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota88' value='1' checked> 
 
					<input name='colegiado88' value='64' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Navarro Mart�n, Patricia</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota89' value='1' checked> 
 
					<input name='colegiado89' value='91' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Ordax Cano, Eva</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota90' value='1' checked> 
 
					<input name='colegiado90' value='51' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Ortega Monllor, Mar�a de Los �ngeles</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota91' value='1' checked> 
 
					<input name='colegiado91' value='117' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Ort�z Gonz�lez, Carolina</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota92' value='1' checked> 
 
					<input name='colegiado92' value='143' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Palomero Sierra, M� Asunci�n</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota93' value='1' checked> 
 
					<input name='colegiado93' value='156' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Pardo Mantec�n, Mar�a</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota94' value='1' checked> 
 
					<input name='colegiado94' value='137' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Pastor Gil, Rosa</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota95' value='1' checked> 
 
					<input name='colegiado95' value='79' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Patino Castellanos, Ver�nica</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota96' value='1' checked> 
 
					<input name='colegiado96' value='140' type='hidden'> 
 
					</td> 
</tr> 
<tr> 
<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Pay� Bign�, Mar�a Reyes</td> 
<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota97' value='1' checked> 
 
					<input name='colegiado97' value='104' type='hidden'> 
 
					</td> 
</tr> 

<tr> 
<td height='25'>&nbsp;</td> 
<td align='right'><input name="enviar" value="Guardar Cambios" type="submit" /></td></tr> 
</table> 
 </form> 
  
      </td> 
      </tr>     
      <tr> 
        <td width="225">&nbsp;</td> 
        <td>&nbsp;</td> 
      </tr>    
      <tr> 
        <td height="25" colspan="2" align="center">&nbsp;</td> 
      </tr> 
    </table> 
 <?php
			}
 ?>
	<!-- fin de tabla de contenido--> 
    </div> 
<!-- *******************************************************--> 
 
	<div style="clear:both"></div> 
</div> 
<div id="footer" class="footer"><a href="http://www.obsesiondigital.com" target="_blank">Obsesion Digital</a> | 2006-2011 &nbsp;&nbsp;&nbsp;</div> 
<br > 
<br > 
<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0!" width="88" height="31" border="0" ><br > 
</body> 
</html> 
