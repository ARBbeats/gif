<?php
/**
 *
 * @package local
 * @subpackage excel export report
 * @copyright 2016 Sebastian Velasquez (sevelasquez@alumnos.uai.cl)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


global $DB, $USER, $PAGE, $OUTPUT;
// Parameter passed from the url.



$grupo = "select s.id as id,count(g.userid) as sum,(SELECT count(u.userid) FROM mdl_quiz_sections as s join mdl_user_enrolments as u on (s.id=u.enrolid))-count(u.enrolid) as fa
from mdl_quiz_grades as g
join mdl_quiz_sections as s on (s.quizid=g.quiz)
join mdl_user_enrolments as u on (u.userid=g.userid)
group by s.id desc";
//ver seeciones que tiene asignada

//get data from db
$d = $DB->get_records_sql($grupo);

if ($d > 0) {
	require_once '/../../../PHPExcel_1.8.0/Classes/PHPExcel.php';
	global $DB, $USER, $PAGE, $OUTPUT;
	$objPHPExcel = new PHPExcel();

	//Informacion del excel
	$objPHPExcel->
	getProperties()
	->setCreator($d->id)
	->setLastModifiedBy("ingenieroweb.com.co")
	->setTitle("Exportar excel desde mysql")
	->setSubject("Ejemplo 1")
	->setDescription("Documento generado con PHPExcel")
	->setKeywords("ingenieroweb.com.co  con  phpexcel")
	->setCategory("ciudades");

	$i = 1;
	while ($d = $DB->get_records_sql($grupo)) {
			
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $d->id);

		$i++;

	}
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Analisis.xls"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;

?>