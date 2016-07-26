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
require_once("library/FPDF/fpdf.php");
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */


class PDF extends FPDF{
	// Cabecera de página
	function Header(){
	    // Logo
	     $this->Image('img/Logo_fertinitro.png',10,8,33);

	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Movernos a la derecha
	    $this->Cell(60);
	    // Título
	    $this->Cell(80,10,'SAIGTH - DNF Individual 2016',1,0,'C');
	    // Salto de línea
	    $this->Ln(20);
	}

}


class DesarrolloController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Personalpropio','Cargo','Curso','CursoPersonalpropio');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	
	public function index(){
	}

	public function aprobar_curso(){
		$this->autoRender = false;
		if(isset($_POST['data'])){
			$data = $_POST['data'];
			$data['status'] = 'EJECUTADO';
			$data['dnf'] = 1;
				
			if($this->CursoPersonalpropio->save($data)){
				return 1;
			}else{
				return 0;
			}

		}
		return 0;
	}

	public function aprobar(){
		$persona = array();
		$cursos = array();
		if(isset($this->request->query['filtro'])){

			$filtro = $this->request->query['filtro'];

			if(!empty($filtro)){
				$persona = $this->Personalpropio->findByCedula($filtro);
			}

			if(!empty($persona)){
				foreach ($persona['Curso'] as $key => $value) {
					if($value['CursosPersonalpropio']['status'] == 'PENDIENTE'){
						array_push($cursos, array('id'=>$value['CursosPersonalpropio']['id'],'nombre' => $persona['Personalpropio']['nombre'],'curso' => $value['nombre'],'area' => $value['area']));
					}
				}		
			}else{
				$this->Session->setFlash('El número de cédula no fue encontrado. Inténtelo nuevamente.', 'default', array('class' => 'error_message'));
			}
		
		
	}
		// debug($cursos);
		$this->set('cursos', $cursos);
		$this->set('persona', $persona);
	}

	public function dnf(){

		if ($this->request->is('post')) {
			if(isset($this->request->query['filtro']) && $this->request->query['filtro']!=''){

				$persona = $this->Personalpropio->findById($this->request->data['persona']['id']);
				// if($persona['Personalpropio']['dnf'] == '1'){
				// 	debug($this->request->data);die;
				// }else{

					$courses = array();
					$cursos = $this->request->data['Dnf'];

					foreach ($cursos as $key => $value) {
						if($value['nombre_curso'] == ''){
							unset($cursos[$key]);
						}else{
							array_push($courses, array(
								'nombre' => $value['nombre_curso'],
								'area' => $value['area_curso'],
								'horas' => $value['horas_curso']
							));
						}
					}
					
					$pending = array();
						if($this->Curso->saveAll($courses)){
							$cursos_id = $this->Curso->inserted_ids;
							foreach ($cursos_id as $key => $value) {
								array_push($pending, array(
									'curso_id' =>$value,
									'personalpropio_id' => $this->request->data['persona']['id'],
									'status' => 'PENDIENTE',
									'horas' => $courses[$key]['horas'],
									'dnf' => 1
								));
							}
					}

					if($this->CursoPersonalpropio->saveAll($pending)){
						if($persona['Personalpropio']['dnf'] == '0'){
							$this->Personalpropio->id = $this->request->data['persona']['id'];
							$this->Personalpropio->saveField('dnf', 1);
							$this->Personalpropio->saveField('nombre_supervisor', $this->request->data['Supervisor']['nombre_supervisor']);
							$this->Personalpropio->saveField('cargo_supervisor', $this->request->data['Supervisor']['cargo_supervisor']);
						}
						$this->Session->setFlash('El D.N.F fue guardado con éxito.', 'default', array('class' => 'success_message'));
						$propios = array();

						$filtro = $this->request->query['filtro'];
						$propios = $this->Personalpropio->findByCedula($filtro);
						$ingreso_1 = split('-', $propios['Personalpropio']['fecha_ingreso']);
						$ingreso_1 = $ingreso_1[2].'-'.$ingreso_1[1].'-'.$ingreso_1[0];
						$propios['Personalpropio']['fecha_ingreso'] = $ingreso_1;

						$ingreso_2 = split('-', $propios['Personalpropio']['fecha_ingreso_puesto']);
						$ingreso_2 = $ingreso_2[2].'-'.$ingreso_2[1].'-'.$ingreso_2[0];
						$propios['Personalpropio']['fecha_ingreso_puesto'] = $ingreso_2;	

						$datetime1 = new DateTime($propios['Personalpropio']['fecha_ingreso']);
						$datetime2 = new DateTime("now");
						$interval = $datetime1->diff($datetime2);
						$propios['Personalpropio']['experiencia'] = $interval->y;	

						$this->request->data = $propios;
					}
				// }

			}else{
				$this->Session->setFlash('Error. Debe seleccionar un empleado.', 'default', array('class' => 'error_message'));
					$this->request->data = array();
			}



		}else{
			$propios = array();

			if(isset($this->request->query['filtro']) && $this->request->query['filtro']!=''){

				$filtro = $this->request->query['filtro'];
				$propios = $this->Personalpropio->findByCedula($filtro);

				if(!empty($propios)){
					$ingreso_1 = split('-', $propios['Personalpropio']['fecha_ingreso']);
					$ingreso_1 = $ingreso_1[2].'-'.$ingreso_1[1].'-'.$ingreso_1[0];
					$propios['Personalpropio']['fecha_ingreso'] = $ingreso_1;	

					$ingreso_2 = split('-', $propios['Personalpropio']['fecha_ingreso_puesto']);
					$ingreso_2 = $ingreso_2[2].'-'.$ingreso_2[1].'-'.$ingreso_2[0];
					$propios['Personalpropio']['fecha_ingreso_puesto'] = $ingreso_2;	

					$datetime1 = new DateTime($propios['Personalpropio']['fecha_ingreso']);
					$datetime2 = new DateTime("now");
					$interval = $datetime1->diff($datetime2);
					$propios['Personalpropio']['experiencia'] = $interval->y;	




				}else{
					$this->Session->setFlash('El número de cédula no fue encontrado. Inténtelo nuevamente.', 'default', array('class' => 'error_message'));
				}
				$this->request->data = $propios;
			}else{
				$this->request->data = $propios;
			}

		}
	}

	public function imprimir($id = 0){

		$persona = $this->Personalpropio->findById($id);
		// debug($persona);die;
// debug($_SERVER["DOCUMENT_ROOT"].'/fertinitro/img/logo.JPG');
    $pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(0,10,'Fecha: '.date("d") . "/" . date("m") . "/" . date("Y"),0,1);
		$pdf->Ln();


		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,5,utf8_decode('Cédula: '),0,0);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(0,5,utf8_decode($persona['Personalpropio']['cedula']),0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,5,'Apellidos y Nombres: ',0,0);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(0,5,utf8_decode($persona['Personalpropio']['nombre']),0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,5,'Edad: ',0,0);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(0,5,utf8_decode($persona['Personalpropio']['edad']),0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,5,utf8_decode('Nivel académico: '),0,0);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(0,5,utf8_decode($persona['Personalpropio']['nivel_educativo']),0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,5,'Tipo de contrato: ',0,0);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(0,5,utf8_decode($persona['Personalpropio']['contrato']),0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,5,'Cargo actual: ',0,0);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(0,5,utf8_decode($persona['Cargo']['nombre']),0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,5,'Departamento: ',0,0);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(0,5,utf8_decode($persona['Personalpropio']['superintendencia']),0,1);
		$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(0,10,utf8_decode('FORMACIÓN SUGERIDA: '),0,1);
		$header = array('Nombre del Curso', 'Area', 'Horas Estimadas');

		foreach($header as $col)
        $pdf->Cell(60,7,$col,1);


    $pdf->Ln();
		$pdf->SetFont('Times','',12);
		foreach($persona['Curso'] as $row){
			if($row['CursosPersonalpropio']['status'] == 'PENDIENTE'){
        $pdf->Cell(60,6,utf8_decode($row['nombre']),1);
        $pdf->Cell(60,6,utf8_decode($row['area']),1);
        $pdf->Cell(60,6,$row['CursosPersonalpropio']['horas'],1);
        $pdf->Ln();
      }
    }


		$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();

		$pdf->SetFont('Times','B',12);
		$pdf->Cell(0,10,utf8_decode('INFORMACIÓN DEL SUPERVISOR: '),0,1);
		$pdf->Cell(50,5,'Apellidos y Nombres: ',0,0);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(0,5,$persona['Personalpropio']['nombre_supervisor'],0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,5,utf8_decode('Título del puesto: '),0,0);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(0,5,utf8_decode($persona['Personalpropio']['cargo_supervisor']),0,1);
	
		$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();

		$pdf->Cell(115,5,'',0,0);
		$pdf->Cell(0,5,'______________________________',0,1);
		$pdf->Cell(130,5,'',0,0);
		$pdf->Cell(0,5,'Firma del Trabajador',0,1);

		$pdf->Output();
		exit;
	}


	public function plan(){
		$personal = $this->Personalpropio->find('all',
	  	array(
	      'joins'=>array(
	          array(
	              'type'=>'INNER',
	              'table'=>'cursos_personalpropios',
	              'alias'=>'CursoPersonalpropio',
	              'conditions'=>array(
	                  'CursoPersonalpropio.personalpropio_id = Personalpropio.id',
	                    'Personalpropio.dnf = 1'
	              )
	          ))));
			$personal = array_map('unserialize', array_unique(array_map('serialize', $personal)));

		$reporte = array();
		$actualizar = array();
		$actualizar_p = array();
		foreach ($personal as $persona) {
			foreach ($persona['Curso'] as $curso) {
				if($curso['CursosPersonalpropio']['dnf'] == 1 || $curso['CursosPersonalpropio']['status'] == 'PENDIENTE'){
					// $fecha = $curso['CursosPersonalpropio']['fecha_fin'];
					// $ano = split($fecha, '-');
					// if($ano[0] > 2015){
						array_push($reporte, array(
							'trabajador' => $persona['Personalpropio']['nombre'],
							'cargo_actual' => $persona['Cargo']['nombre'],
							'organizacion' => $persona['Personalpropio']['superintendencia'],
							'curso' => $curso['nombre'],
							'area' => $curso['area'],
							'horas' => $curso['CursosPersonalpropio']['horas']
						));	
					// }else{
					// 	//para los viejos
					// 	array_push($actualizar, array(
					// 		'id' => $curso['CursosPersonalpropio']['id'],
					// 		'dnf' => 0,
					// 	));
					// 	array_push($actualizar_p, array(
					// 		'id' => $curso['CursosPersonalpropio']['personalpropio_id'],
					// 		'dnf' => 0,
					// 		'nombre_supervisor' => '',
					// 		'cargo_supervisor' => ''
					// 	));
					// }
				}
			}
		}

		$this->CursoPersonalpropio->saveAll($actualizar);
		$this->Personalpropio->saveAll($actualizar_p);

		$this->set('reporte',$reporte);

	}


public function exportar($flag = 0){
	$this->autoRender=false;
	if($flag == 0){
		$personal = $this->Personalpropio->find('all',
	  	array(
	      'joins'=>array(
	          array(
	              'type'=>'INNER',
	              'table'=>'cursos_personalpropios',
	              'alias'=>'CursoPersonalpropio',
	              'conditions'=>array(
	                  'CursoPersonalpropio.personalpropio_id = Personalpropio.id',
	                    'Personalpropio.dnf = 1'
	              )
	          ))));
			$personal = array_map('unserialize', array_unique(array_map('serialize', $personal)));
	}else{
		$personal = $this->Personalpropio->find('all');
	}

		$reporte = array();
		foreach ($personal as $persona) {
			foreach ($persona['Curso'] as $curso) {
				if($flag == 0){
					if($curso['CursosPersonalpropio']['dnf'] == 1 || $curso['CursosPersonalpropio']['status'] == 'PENDIENTE'){
						array_push($reporte, array(
							'cedula' => $persona['Personalpropio']['cedula'],
							'trabajador' => $persona['Personalpropio']['nombre'],
							'cargo_actual' => $persona['Cargo']['nombre'],
							'organizacion' => $persona['Personalpropio']['superintendencia'],
							'curso' => $curso['nombre'],
							'area' => $curso['area'],
							'horas' => $curso['CursosPersonalpropio']['horas'],
							'status' => $curso['CursosPersonalpropio']['status'],
							'fecha_fin' => $curso['CursosPersonalpropio']['fecha_fin'],
							'entidad' => $curso['CursosPersonalpropio']['entidad'],
							'locacion' => $curso['CursosPersonalpropio']['locacion']
						));
					}
				}else{
					array_push($reporte, array(
						'cedula' => $persona['Personalpropio']['cedula'],
						'trabajador' => $persona['Personalpropio']['nombre'],
						'cargo_actual' => $persona['Cargo']['nombre'],
						'organizacion' => $persona['Personalpropio']['superintendencia'],
						'curso' => $curso['nombre'],
						'area' => $curso['area'],
						'horas' => $curso['CursosPersonalpropio']['horas'],
						'status' => $curso['CursosPersonalpropio']['status'],
						'fecha_fin' => $curso['CursosPersonalpropio']['fecha_fin'],
						'entidad' => $curso['CursosPersonalpropio']['entidad'],
						'locacion' => $curso['CursosPersonalpropio']['locacion']
					));
				}
			}
		}



		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("3DLink");
		$objPHPExcel->getProperties()->setLastModifiedBy("3DLink");

		if($flag == 0){
			$objPHPExcel->getProperties()->setTitle("Plan de Formación. Fertinitro");
			$objPHPExcel->getProperties()->setSubject("Plan de Formación");
			$objPHPExcel->getProperties()->setDescription("Plan de Formación.");
		}else{
			$objPHPExcel->getProperties()->setTitle("Cursos. Fertinitro");
			$objPHPExcel->getProperties()->setSubject("Cursos");
			$objPHPExcel->getProperties()->setDescription("Cursos.");
		}

		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'CEDULA');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'TRABAJADOR');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'CARGO');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ORGANIZACION');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'CURSO');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'AREA');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'HORAS PROGRAMADAS');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'ESTATUS');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'FECHA FIN');
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'ENTIDAD');
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'LOCALIDAD');

		foreach ($reporte as $key => $value) {

	    $urut=$key+2;
	    $a='A'.$urut;
	    $b='B'.$urut;
	    $c='C'.$urut;
	    $d='D'.$urut;
	    $e='E'.$urut;
	    $f='F'.$urut;
	    $g='G'.$urut;
	    $h='H'.$urut;
	    $i='I'.$urut;
	    $j='j'.$urut;
	    $k='K'.$urut;
	    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue($a, $value['cedula'])
        ->setCellValue($b, $value['trabajador'])
        ->setCellValue($c, $value['cargo_actual'])
        ->setCellValue($d, $value['organizacion'])
        ->setCellValue($e, $value['curso'])
        ->setCellValue($f, $value['area'])
        ->setCellValue($g, $value['horas'])
        ->setCellValue($h, $value['status'])
        ->setCellValue($i, $value['fecha_fin'])
        ->setCellValue($j, $value['entidad'])
        ->setCellValue($k, $value['locacion']);
		}




		// Rename worksheet
// Rename worksheet
		if($flag == 0){
			$objPHPExcel->getActiveSheet()->setTitle('Plan de Formacion');
			header('Content-Disposition: attachment;filename="Plan de Formacion.xls"'); // file name of excel
		}else{
			$objPHPExcel->getActiveSheet()->setTitle('Cursos');
			header('Content-Disposition: attachment;filename="Cursos.xls"'); // file name of excel
		}
			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			// Redirect output to a client’s web browser (Excel5)
			header('Content-Type: application/vnd.ms-excel');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');
			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0
			 
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;


	}

	public function deleteCourse(){
		$this->autoRender=false;

		if(isset($_POST['data'])){
			$data=$_POST['data'];
			if($this->Curso->delete($data['id_course'],true)){
				return true;
			}else{
				return false;
			}
		}
	}

}
