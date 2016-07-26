<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('AppController', 'Controller');

require_once("library/PHPExcel/IOFactory.php");
require_once("library/PHPExcel/PHPExcel.php");
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class MotorController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Personalpropio','Cargo','Curso', 'CursoPersonalpropio');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	
	public function index($flag=0){

		if($flag==1){
			$nombreArchivo = 'files/Listado.xlsm';
		 	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
		 	//Asigno la hoja de calculo activa
			$objPHPExcel->setActiveSheetIndex(0); //empleados normales
			//Obtengo el numero de filas del archivo
			$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
			/*
				filas nulas:
					al principio: 12
					al final: 19
			*/

			$informacion = array();


			for ($i = 13; $i <= $numRows-19; $i++) {
				$fecha_ingreso = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getFormattedValue();
				$fecha_ingreso_aux = split('-', $fecha_ingreso);
				if($fecha_ingreso_aux[2] > 20)
					$anho = '19'.$fecha_ingreso_aux[2];
				else
					$anho = '20'.$fecha_ingreso_aux[2];

				$fecha_ingreso = $anho.'-'.$fecha_ingreso_aux[0].'-'.$fecha_ingreso_aux[1];


				$fecha_ingreso_cargo = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getFormattedValue();
				$fecha_ingreso_cargo_aux = split('-', $fecha_ingreso_cargo);
				if($fecha_ingreso_cargo_aux[2] > 20)
					$anho = '19'.$fecha_ingreso_cargo_aux[2];
				else
					$anho = '20'.$fecha_ingreso_cargo_aux[2];

				$fecha_ingreso_cargo = $anho.'-'.$fecha_ingreso_cargo_aux[0].'-'.$fecha_ingreso_cargo_aux[1];

				$cargo = $this->Cargo->findByNombre($objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue());
				if(isset($cargo['Cargo']['id']))
					$cargo = $cargo['Cargo']['id'];
				else
					$cargo=172;

				$user = array();
				$user = $this->Personalpropio->findByCedula($objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue());

				$fecha1 = new DateTime($fecha_ingreso);
				$fecha2 = new DateTime($fecha_ingreso_cargo);

				$experiencia = $fecha1->diff($fecha2);
				$experiencia = $experiencia->y;

				if(!empty($user)){
					array_push($informacion, array(
						'id' => $user['Personalpropio']['id'],
						'cedula' => $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue(),
						'nombre' => $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue(),
						'sexo' => $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue(),
						'edad' => $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue(),
						'contrato' => $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue(),
						'salario' => $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue(),
						'nomina' => $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue(),
						'horario' => $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue(),
						'gerencia' => $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue(),
						'superintendencia' => $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue(),
						'fecha_ingreso' => $fecha_ingreso,
						'fecha_ingreso_puesto' => $fecha_ingreso_cargo,
						'posicion_actual' => $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue(),
						'nivel_educativo' => $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue(),
						'experiencia' => $experiencia,
						'cargo_id' => $cargo
					));	 
				}else{
					array_push($informacion, array(
						'cedula' => $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue(),
						'nombre' => $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue(),
						'sexo' => $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue(),
						'edad' => $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue(),
						'contrato' => $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue(),
						'salario' => $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue(),
						'nomina' => $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue(),
						'horario' => $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue(),
						'gerencia' => $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue(),
						'superintendencia' => $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue(),
						'fecha_ingreso' => $fecha_ingreso,
						'fecha_ingreso_puesto' => $fecha_ingreso_cargo,
						'posicion_actual' => $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue(),
						'nivel_educativo' => $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue(),
						'experiencia' => $experiencia,
						'cargo_id' => $cargo
					));	 
				}

		 }
		 // debug($informacion);die;
			// $this->Personalpropio->deleteAll(true,false);
		 	if($this->Personalpropio->saveAll($informacion)){
				$this->Session->setFlash('La base de datos fue actualizada con éxito.', 'default', array('class' => 'success_message'));
		 	}else{			
		 		$this->Session->setFlash('Ha ocurrido un error, inténtelo nuevamente.', 'default', array('class' => 'error_message'));
		 	}
		 }
	}


// public function cargar_cursos(){

// 			$nombreArchivo = 'files/Data2013.xlsx';
// 		 	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
// 		 	//Asigno la hoja de calculo activa
// 			$objPHPExcel->setActiveSheetIndex(0); //empleados normales
// 			//Obtengo el numero de filas del archivo
// 			$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
// 			/*
// 				filas nulas:
// 					al principio: 4
// 			*/

// 			$informacion = array();

// 			for ($i = 5; $i <= $numRows; $i++) {
// 					array_push($informacion, array(
// 						'nombre' => strtoupper($objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue()),
// 						'area' => strtoupper($objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue())
// 					));	 
// 		 }
// $informacion = array_unique($informacion);
// // debug(count($informacion));die;
// debug($this->Curso->saveAll($informacion));
// 			// $this->CursoPersonalpropio->deleteAll(true,false);
// 		 	// debug($this->CursoPersonalpropio->saveAll($informacion));

// }

function unique_multidim_array($array, $key) { 
    $temp_array = array(); 
    $i = 0; 
    $key_array = array(); 
    
    foreach($array as $val) { 
        if (!in_array($val[$key], $key_array)) { 
            $key_array[$i] = $val[$key]; 
            $temp_array[$i] = $val; 
        } 
        $i++; 
    } 
    return $temp_array; 
}

// public function depurar(){
// 	$cursos_ = $this->Curso->find('all');
// 	$cursos = array();
// 	foreach ($cursos_ as $curso) {
// 		array_push($cursos, array(
// 			'nombre' => $curso['Curso']['nombre'],
// 			'area' => $curso['Curso']['area']
// 		));
// 	}
// 	$cursos = $this->unique_multidim_array($cursos,'nombre'); 
// 	// debug($cursos);
// 	// $cursos = array_unique($cursos);
// 	$this->Curso->deleteAll(true,false);
// 	debug($this->Curso->saveAll($cursos));
// }


// public function cursos_personas(){

// 			$nombreArchivo = 'files/Data2013.xlsx';
// 		 	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
// 		 	//Asigno la hoja de calculo activa
// 			$objPHPExcel->setActiveSheetIndex(0); //empleados normales
// 			//Obtengo el numero de filas del archivo
// 			$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
// 			/*
// 				filas nulas:
// 					al principio: 4
// 			*/

// 			$informacion = array();

// 			for ($i = 5; $i <= $numRows; $i++) {

// 				$fecha_fin = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getFormattedValue();

// 				if(!empty($fecha_fin)){

// 					// if($i==483 || $i==572 || $i==603 || $i==470){

// 					// 	$fecha_fin = '2015-11-31';

// 					// }else{
// 						$fecha_fin_aux = split('-', $fecha_fin);
// 						// debug($fecha_fin.'-'.$i);
// 						// debug($fecha_fin_aux[2]);
// 						// debug($i.' - '.$fecha_fin);
// 						if($fecha_fin_aux[2] > 20)
// 							$anho = '19'.$fecha_fin_aux[2];
// 						else
// 							$anho = '20'.$fecha_fin_aux[2];

// 						$fecha_fin = $anho.'-'.$fecha_fin_aux[0].'-'.$fecha_fin_aux[1];
// 					}
// 				// }
// 				$user = array();
// 				$user = $this->Personalpropio->findByCedula($objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue());
// 				$curso = $this->Curso->findByNombre(strtoupper($objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue()));
// 				// debug($user);
// 				if(!empty($user)){
// 					array_push($informacion, array(
// 						'personalpropio_id' => $user['Personalpropio']['id'],
// 						'curso_id' => $curso['Curso']['id'],
// 						'status' => strtoupper($objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue()),
// 						'fecha_fin' => $fecha_fin,
// 						'horas' => strtoupper($objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue()),
// 						'entidad' => strtoupper($objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue())
// 					));	 
// 				}
// 		 }
// // debug($informacion);die;
// 			// $this->CursoPersonalpropio->deleteAll(true,false);
// 		 	// debug($this->CursoPersonalpropio->saveAll($informacion));

// }

	public function upload() {
		// debug($_FILES);
		$this->autoRender = false;
		$time = strtotime ( "now" );
		$targetFolder = '../webroot/files/'; // Relative to the root
		if (! empty ( $_FILES )) {
			$tempFile = $_FILES ['file'] ['tmp_name'];
			$targetPath = $targetFolder;
			// Validate the file type
			$fileTypes = array (
					'xlsm',
					'xlsx'
			); // File extensions
			$fileParts = pathinfo ( $_FILES ['file'] ['name'] );

			if (in_array ( $fileParts ['extension'], $fileTypes )) {
				if(file_exists('files/Listado.xlsm')){
					unlink('files/Listado.xlsm');
				}
				$name = "Listado";
				$targetFile = rtrim ( $targetPath, '/' ) . '/' . $name . "." . $fileParts ['extension'];
				if (move_uploaded_file ( $tempFile, $targetFile )) {
					$namepath = $name . "." . $fileParts ['extension'];
					return json_encode ( array (
							1,
							$namepath 
					) );
				} else {
					return json_encode ( array (
							false,
							false 
					) );
				}
			} else {
				echo 'Archivo inválido';
			}
		}
	
	}




}
