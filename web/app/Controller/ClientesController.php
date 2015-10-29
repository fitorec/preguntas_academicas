<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ClientesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cliente->recursive = 0;
		$this->set('clientes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
		$this->set('cliente', $this->Cliente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if ($this->Cliente->nuevo($this->request->data)) {
				$this->Flash->success('El cliente fue gardado.');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error('No se pudo agregar el cliente.');
			}
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function login() {
		if ($this->request->is('post')) {
			$pass = $this->request->data['password'];
			$options = array('conditions' => array('Cliente.password' => $pass));
			$cliente = $this->Cliente->find('first', $options);
			if(!empty($cliente)) {
				if($cliente['Cliente']['username'] == $this->request->data['username']) {
					$cliente['Cliente'][' hash_session'] = md5(mt_rand() . md5(mt_rand()));
					$this->Cliente->save($cliente);
					die($cliente['Cliente'][' hash_session']);
				}
			}
		}
		die('Error!');
	}
/**
 * add method
 *
 * @return void
 */
	public function generar_rodante($hash_session = null) {
		$sig_codigo = $this->Cliente->hash();
		die($sig_codigo);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Flash->success(__('The cliente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The cliente could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
			$this->request->data = $this->Cliente->find('first', $options);
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
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cliente->delete()) {
			$this->Flash->success(__('The cliente has been deleted.'));
		} else {
			$this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
