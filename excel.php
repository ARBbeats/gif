<?php

// conexion con base de datos
 $conexion = mysql_connect ("localhost", "root", "6500233");
 mysql_select_db ("moodle", $conexion);    
 
 //consulta para pedir los datos necesarios y agregarlos al excel
 $sql = "select s.id as id,count(g.userid) as sum,(SELECT count(u.userid) FROM mdl_quiz_sections as s join mdl_user_enrolments as u on (s.id=u.enrolid))-count(u.enrolid) as fa
from mdl_quiz_grades as g
join mdl_quiz_sections as s on (s.quizid=g.quiz)
join mdl_user_enrolments as u on (u.userid=g.userid)
group by s.id desc";
 
 //ejecutar consulta sql
 $resultado = mysql_query ($sql, $conexion) or die (mysql_error ());
 $registros = mysql_num_rows ($resultado);
 
 //pregunta si existe algo en la variable registros
 if ($registros > 0) {
 	//llamo a la libreria excel
   require_once '/../../../PHPExcel_1.8.0/Classes/PHPExcel.php';
   $objPHPExcel = new PHPExcel();
   
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("")
        ->setLastModifiedBy("")
        ->setTitle("Exportar excel desde mysql")
        ->setSubject("Ejemplo 1")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("")
        ->setCategory("Datos");    

   $i = 1;    
   
   //insertamos los datos de la variable registros al excel, en las columnas que sean
   //las adecuadas
   while ($registros = mysql_fetch_object ($resultado)) {
       
      $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $registros->id)
            ->setCellValue('B'.$i, $registros->sum)
            ->setCellValue('C'.$i, $registros->fa);
      $i++;
      
   }
}

//informacion del documento que será generado
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Analisis.xls"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
mysql_close ();
?>