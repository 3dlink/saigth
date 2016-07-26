<?php
App::uses('AppController', 'Controller');
/**
 * Cargos Controller
 *
 * @property Cargo $Cargo
 * @property PaginatorComponent $Paginator
 */
class CargosController extends AppController {

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
	            		'Cargo.nombre LIKE "%'.$filtro.'%"'
        			)
				);
			}

		}
		$this->Cargo->recursive = 0;
		$this->set('cargos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*				$this->Session->setFlash('La base de datos fue actualizada con éxito.', 'default', array('class' => 'success_message'));

		 		$this->Session->setFlash('Ha ocurrido un error, inténtelo nuevamente.', 'default', array('class' => 'error_message'));
*/

	public function view($id = null) {
		if (!$this->Cargo->exists($id)) {
			throw new NotFoundException(__('Invalid cargo'));
		}
		$options = array('conditions' => array('Cargo.' . $this->Cargo->primaryKey => $id));
		$this->set('cargo', $this->Cargo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cargo->create();
			if ($this->Cargo->save($this->request->data)) {
				$this->Session->setFlash('El cargo fue guardado con éxito.', 'default', array('class' => 'success_message'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El cargo no ha sido guardado, inténtelo nuevamente.', 'default', array('class' => 'error_message'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cargo->exists($id)) {
			throw new NotFoundException(__('Invalid cargo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cargo->save($this->request->data)) {
				$this->Session->setFlash('El cargo fue guardado con éxito.', 'default', array('class' => 'success_message'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El cargo no ha sido guardado, inténtelo nuevamente.', 'default', array('class' => 'error_message'));
			}
		} else {
			$options = array('conditions' => array('Cargo.' . $this->Cargo->primaryKey => $id));
			$this->request->data = $this->Cargo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cargo->id = $id;
		if (!$this->Cargo->exists()) {
			throw new NotFoundException(__('Invalid cargo'));
		}

		$this->request->allowMethod('get', 'delete');
		if ($this->Cargo->delete()) {
				$this->Session->setFlash('El cargo fue eliminado con éxito.', 'default', array('class' => 'success_message'));
		} else {
				$this->Session->setFlash('El cargo no ha sido eliminado, inténtelo nuevamente.', 'default', array('class' => 'error_message'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
