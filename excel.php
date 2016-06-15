<?php

// conexion con base de datos
 $conexion = mysql_connect ("localhost", "root", "6500233");
 mysql_select_db ("moodle", $conexion);    
 
 //consulta para pedir los datos necesarios y agregarlos al excel
 //las letras s, g y u son letras elegidas al azar para nombrar de manera distintas a las tablas
 $sql = "select s.id as id,count(g.userid) as sum, (SELECT count(u.userid) FROM mdl_quiz_sections as s join mdl_user_enrolments as u on (s.id=u.enrolid))-count(g.userid) as fa
from mdl_quiz_grades as g
join mdl_quiz_sections as s on (s.quizid=g.quiz)
group by s.id asc";
 
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

   $i = 3;    
   $ii= 2;
   //insertamos los datos de la variable registros al excel, en las columnas que sean
   //las adecuadas
   
   while ($registros = mysql_fetch_object ($resultado)) {
       
      $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B'.$ii, 'Seccion')
            ->setCellValue('C'.$ii, 'Quizes Rendidos')
            ->setCellValue('D'.$ii, 'Quizes por Rendir')
            ->setCellValue('B'.$i, $registros->id)
            ->setCellValue('C'.$i, $registros->sum)
            ->setCellValue('D'.$i, $registros->fa);
      $i++;
      //El establecimiento de marcos
      
      
   }
}

//informacion del documento que será generado
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Analisis.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
mysql_close ();
?>