<?php
App::uses('AppController', 'Controller');

 App::uses('String', 'Utility');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
		if(!AuthComponent::user()){
		    $this->redirect(array('controller' => 'pages', 'action' => 'index'));
		}
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }


public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
}
	
	public function logout(){
		$this->Auth->logout();
		return $this->redirect('/pages/home');
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		
		if(AuthComponent::user('role') == '1'){
		    $this->redirect(array('controller' => 'topics', 'action' => 'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		if(AuthComponent::user('role') == '1'){
		    $this->redirect(array('controller' => 'topics', 'action' => 'index'));
		}
		
        if ($this->request->is('post')) {
            $this->User->create();
			if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
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
		
		if(AuthComponent::user('role') == '1'){
		    $this->redirect(array('controller' => 'topics', 'action' => 'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
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
		
		if(AuthComponent::user('role') == '1'){
		    $this->redirect(array('controller' => 'topics', 'action' => 'index'));
		}
		
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function getUsernameById($id){
		$data = $this->User->findById($id);
		return $data;
	}
	
	public function getRoleNameById($id){
		if($id == '1'){
			return 'Reader';
		}elseif($id == '2'){
			return 'Admin';
		}else{
			return 'Author';
		}
		
	}
	
	public function findUsersByRole($role){
		
		$data = $this->User->find( 'all' , array(
        'conditions' => array('User.role ' => $role)
    ));
		return $data;
	}
}
