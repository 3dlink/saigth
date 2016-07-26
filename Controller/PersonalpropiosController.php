<?php
App::uses('AppController', 'Controller');
/**
 * Personalpropios Controller
 *
 * @property Personalpropio $Personalpropio
 * @property PaginatorComponent $Paginator
 */
class PersonalpropiosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if(isset($this->request->query['filtro'])){

			$filtro = $this->request->query['filtro'];

			if(!empty($filtro)){
				$this->Paginator->settings = array(
					'conditions' => array(
	            		'Personalpropio.cedula LIKE "%'.$filtro.'%"'
        			)
				);
			}

		}
		// $this->Personalpropios->recursive = 0;
		$this->set('personalpropios', $this->Paginator->paginate());
		// debug($this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Personalpropio->exists($id)) {
			throw new NotFoundException(__('Invalid personal propio'));
		}
		$options = array('conditions' => array('Personalpropio.' . $this->Personalpropio->primaryKey => $id));


		$propios = $this->Personalpropio->find('first', $options);
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

		$this->set('personalpropio', $propios);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Personalpropio->create();
			if ($this->Personalpropio->save($this->request->data)) {
				$this->Session->setFlash(__('The personal propio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The personal propio could not be saved. Please, try again.'));
			}
		}
		$cargos = $this->Personalpropio->Cargo->find('list');
		$this->set(compact('cargos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Personalpropio->exists($id)) {
			throw new NotFoundException(__('Invalid personal propio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Personalpropio->save($this->request->data)) {
				$this->Session->setFlash(__('The personal propio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The personal propio could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Personalpropio.' . $this->Personalpropio->primaryKey => $id));
			$this->request->data = $this->Personalpropio->find('first', $options);

			// debug($this->request->data);
			$ingreso_1 = split('-', $this->request->data['Personalpropio']['fecha_ingreso']);
			$ingreso_1 = $ingreso_1[2].'-'.$ingreso_1[1].'-'.$ingreso_1[0];
			$this->request->data['Personalpropio']['fecha_ingreso'] = $ingreso_1;
		}
		$cargos = $this->Personalpropio->Cargo->find('list',array('order'=>array('Cargo.nombre' => 'asc')));
		$this->set(compact('cargos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Personalpropio->id = $id;
		if (!$this->Personalpropio->exists()) {
			throw new NotFoundException(__('Invalid personal propio'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Personalpropio->delete()) {
			$this->Session->setFlash(__('The personal propio has been deleted.'));
		} else {
			$this->Session->setFlash(__('The personal propio could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
