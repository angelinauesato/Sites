<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	  
        public function beforeFilter(){
      
            $this->Auth->allow('index','view', 'add');
        }
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comment->create();
			if(AuthComponent::user()){
				$this->request->data['Comment']['user_id'] = AuthComponent::user('id');
			}else{
				$this->request->data['Comment']['user_id'] = 0;	
			}
			
			if ($this->Comment->save($this->request->data)) {
				 $this->Session->setFlash( 'The comment has been saved.');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The comment could not be saved. Please, try again.'));
			}
		}
		$this->set('posts', $this->Comment->Post->find('list'));
		$this->set('users', $this->Comment->User->find('list'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
			$data = $this->Comment->findById($id);
			if(!AuthComponent::user() or AuthComponent::user('id') <>  $data['Comment']['user_id'] or AuthComponent::user('role') <> 2 ){
				$this->redirect('index');
			}
			if ($this->request->is(array('post', 'put'))) {
			
				if ($this->Comment->save($this->request->data)) {
					$this->Session->setFlash(__('The comment has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
				}
		
			} else {
				$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
				$this->request->data = $this->Comment->find('first', $options);
			}
					
		
		$posts = $this->Comment->Post->find('list');
		$users = $this->Comment->User->find('list');
		$this->set(compact('posts', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$data = $this->Comment->findById($id);
		if(!AuthComponent::user() or AuthComponent::user('id') <>  $data['Comment']['user_id'] or AuthComponent::user('role') <> 2 ){
			$this->redirect('index');
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('The comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
		
	public function findCommentsByPostId($id = 0){
		 $data = $this->Comment->findByPostId($id);
		 print_r($data);
		 return $data;
	}
}
