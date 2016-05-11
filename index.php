<?php require_once (dirname ( __FILE__ ) . '/../../../config.php');?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="estilo.css">
<title>
GiF
</title>
<body>
<div id="linea">
</div>
<div id="header">
	<div id="logo"> // logo de la esquina derecha, que redirige a home
			<a class="logo" href="<?php echo $CFG->wwwroot . '/local/gif/gif/index.php'; ?> ">
				<img src="images/gil.gif">
			</a>
		
	</div>
</div>

<div id="main">
	<div id="container1" class="clearfix">
		<a class="dest cat1" href="<?php echo $CFG->wwwroot . '/local/gif/gif/profesores.php'; ?>">
 			<img width="256" height="256" src="images/profesoresg.png">
		</a>
		<a class="dest cat2" href="<?php echo $CFG->wwwroot . '/local/gif/gif/alumnos.php'; ?>">
			<img width="256" height="256" src="images/alumnosg.png">
		</a>
	
	</div>
	<div id="separador">
	</div>

<div id="foot">
	<div class="footer">&copy; <?php echo date('Y');?> Universidad Adolfo Ib&aacute;&ntilde;ez</div>

</body>