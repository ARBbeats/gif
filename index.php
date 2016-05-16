<?php require_once (dirname ( __FILE__ ) . '/../../../config.php');
// Parameter passed from the url.
$name = required_param('name', PARAM_TEXT);
// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance();
$PAGE->set_context($context);
// Check that user is logued in the course.
require_login();
// Page navigation and URL settings.
$PAGE->set_url(new moodle_url('/local/tics331', array('filter'=>$name)));
$PAGE->set_pagelayout('incourse');
$PAGE->set_title('Hello world');
// Show the page header
echo $OUTPUT->header();
// Here goes the content
echo 'Hello world';
// Show the page footer
echo $OUTPUT->footer();

?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!---- estilo de pagina ---->
<link rel="stylesheet" href="estilo.css">
<title>
GiF
</title>
<body>
<div id="linea">
</div>
<!---- logo de inicio de la esquina derecha ---->
<div id="header">
	<div id="logo"> 
			<a class="logo" href="<?php echo $CFG->wwwroot . '/local/gif/gif/index.php'; ?> ">
				<img src="images/gil.gif">
			</a>
		
	</div>
</div>
<!---- Login para alumno y profe ---->
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
<!---- logo ---->
<div id="foot">
	<div class="footer">&copy; <?php echo date('Y');?> Universidad Adolfo Ib&aacute;&ntilde;ez</div>

</body>