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

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	
	public function display() {
		if($this->UserAuth->isLogged()){
			$this->redirect('/dashboard');
		}else{
			$this->redirect('/login');
		}
	}

	public function construccion() {
		//$this->autoRender=false;
		$this->Session->setFlash('Disculpe, el módulo está en construcción.', 'default', array('class' => 'error_message'));
	}

	public function prueba() {
		$this->autoRender=false;
		$nombreArchivo = $this->webroot.'files/listado.xlsx';
	 	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
	 	debug($objPHPExcel);
	}

}
