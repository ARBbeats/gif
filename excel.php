<?php
$conexion = mysql_connect ("localhost", "root", "6500233");
mysql_select_db ("moodle", $conexion);
$sql = "select s.id as id,count(g.userid) as sum,(SELECT count(u.userid) FROM mdl_quiz_sections as s join mdl_user_enrolments as u on (s.id=u.enrolid))-count(u.enrolid) as fa
from mdl_quiz_grades as g 
join mdl_quiz_sections as s on (s.quizid=g.quiz)
join mdl_user_enrolments as u on (u.userid=g.userid)
group by s.id desc";

$resultado = mysql_query ($sql, $conexion) or die (mysql_error ());
$registros = mysql_num_rows ($resultado);

if ($registros > 0) {
	require_once '/../../../PHPExcel_1.8.0/Classes/PHPExcel.php';
	$objPHPExcel = new PHPExcel();

	//Informacion del excel
	$objPHPExcel->
	getProperties()
	->setCreator("ingenieroweb.com.co")
	->setLastModifiedBy("ingenieroweb.com.co")
	->setTitle("Exportar excel desde mysql")
	->setSubject("Ejemplo 1")
	->setDescription("Documento generado con PHPExcel")
	->setKeywords("ingenieroweb.com.co  con  phpexcel")
	->setCategory("ciudades");

	$i = 1;
	while ($registros = mysql_fetch_object ($registro)) {
			
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $registro->id);

		$i++;

	}
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ejemplo1.xls"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2013');
$objWriter->save('php://output');
exit;
mysql_close ();
?>