<?php

/**
 *
 * @package local
 * @subpackage excel export report
 * @copyright 2016 Sebastian Velasquez (sevelasquez@alumnos.uai.cl)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once (dirname ( __FILE__ ) . '/../../../config.php');
global $DB, $USER, $PAGE, $OUTPUT;
// Parameter passed from the url.

// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance();
$PAGE->set_context($context);

// Check that user is logued in the course.
require_login();
if (isguestuser()) {
	die();
}
// Page navigation and URL settings.
$PAGE->set_url(new moodle_url('/local/gif/gif', array('filter'=>$name)));
$PAGE->set_pagelayout('incourse');
$PAGE->set_title('GIF');
// Show the page header
echo $OUTPUT->header();
// Here goes the content


//$asistencia="select s.id,sum(g.id)
	 //   from mdl_quiz_grades as g join mdl_quiz_sections as s on (s.quizid=g.quiz) 
	//	group by s.id desc";



//$data = $DB->get_records_sql("select s.id,sum(g.id)
	//	from mdl_quiz_grades as g join mdl_quiz_sections as s on (s.quizid=g.quiz) 
		//group by s.id desc",array('s.id','sum(g.id)'));


$tabla = new html_table();

//show the people that did the quiz, group by seccions
$grupo = "select s.id as id,sum(g.id) as sum
		from mdl_quiz_grades as g join mdl_quiz_sections as s on (s.quizid=g.quiz) 
		group by s.id desc";
//ver seeciones que tiene asignada

//get data from db
$d = $DB->get_records_sql($grupo);

var_dump($d);
$var = $d->id;
$var2 = $d->sum;

foreach ($d as $data){
	$tabla->data[] = array($data->id.$data->sum);
}
echo html_writer::table ( $tabla );

// Show the page footer
echo $OUTPUT->footer();



?>
