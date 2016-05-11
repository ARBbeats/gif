
<?php
require_once (dirname ( __FILE__ ) . 'moodle/config.php');?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="estilo.css">
<title>
Tutoriales WebCursos
</title>
<body>
<div id="linea">
</div>
<div id="header">
	<div id="logos">
			<a class="logo" href="<?php echo $CFG->wwwroot . '/local/tutoriales/index.php'; ?> ">
				<img src="images/nuevo-logo-wcurso_transp2.gif">
			</a>
		<div class="logo2">
		</div>
	</div>
</div>

<div id="linea">
</div>

<div id="banner">
</div>

<div id="linea2">
</div>

<div id="main">
	<div id="container1" class="clearfix">
		<a class="dest cat1" href="<?php echo $CFG->wwwroot . '/local/tutoriales/profesores.php'; ?>">
 			<img width="256" height="256" src="images/profesoresg.png">
		</a>
		<a class="dest cat2" href="<?php echo $CFG->wwwroot . '/local/tutoriales/alumnos.php'; ?>">
			<img width="256" height="256" src="images/alumnosg.png">
		</a>
		<a class="dest cat3" href="<?php echo $CFG->wwwroot . '/local/tutoriales/coordinadores.php'; ?>">
			<img width="256" height="256" src="images/coordinadoresg.png">
		</a>
		<a class="dest cat4" href="<?php echo $CFG->wwwroot . '/local/tutoriales/administrativos.php'; ?>">
			<img width="256" height="256" src="images/administrativosg.png">
		</a>
	</div>
	<div id="separador">
	</div>
	<div id="container3">
		<a href="<?php echo $CFG->wwwroot . '/local/tutoriales/faq.php'; ?>">
		<img src="images/faq.png">
		</a>
	</div>
	<div id="separador">
	</div>
	<div id="container2">
		<table width="1024px" height="100%">
		<tr>
			<td class="imagen" colspan="2"></td>
		</tr>
		<tr>		
			<td width="50%" height="80%">
				<iframe width="680" height="280" src="http://www.youtube.com/embed/ernR7ahcqyw?feature=player_detailpage" frameborder="0"></iframe>
			</td>
		</tr>
		</table> 
	</div>
</div>
<div id="linea2">
</div>

<div id="foot">
	<div class="footer">&copy; <?php echo date('Y');?> Universidad Adolfo Ib&aacute;&ntilde;ez</div>
	<div id="social">
		<div class="facebook">
			<a href="https://www.facebook.com/coordinador.webcursosuai">
			<img width="50" height="50" src="images/facebook.png">
			</a></div>
		<div class="twitter">
			<a href="https://twitter.com/UAI_CL">
		<img width="50" height="50" src="images/twitter.png">
		</a></div>
	</div>
</div>
</body>