<?php

    class PostsController extends AppController{
        
        
        var $components =  array('Session');
        
        public function beforeFilter(){
      
            $this->Auth->allow('view_posts','findAllPosts', 'view');
        }
    
    
        public function index(){
      
          $data = $this->Post->find('all');
          $this->set('posts', $data);
        }
    
        public function add($id){
            // just author and admin can create new posts
            if(AuthComponent::user('role') == '2' or AuthComponent::user('role') == '3'){
                
                if($this->request->is('post')){
                    
                    $this->Post->create();
                    $this->request->data['Post']['topic_id'] = $id;
                     $this->request->data['Post']['user_id'] = AuthComponent::user('id');
                    if($this->Post->save($this->request->data)){
                      $this->Session->setFlash( 'The Post has been created!');
                          
                      $this->redirect('/topics/view/'.$id);
                    }
                }
            }
            $this->set('topics', $this->Post->Topic->find('list'));
        }
        
        public function view($id){
            $data = $this->Post->findById($id);
            $this->set('post', $data);
        }
        
        public function edit($id){
            $data = $this->Post->findById($id);
            if($this->request->is(array('post', 'put'))){
        
              $this->Post->id = $id;
                  if($this->Post->save($this->request->data)){
                    $this->Session->setFlash( 'The Post has been editted!');
          
                    $this->redirect('index');
                }
            }
            $this->set('topics', $this->Post->Topic->find('list'));
            $this->request->data = $data;
        }
    
        public function delete($id){
          
          $this->Post->id = $id;
          if($this->request->is(array('post', 'put'))){
            
            if($this->Post->delete()){
              $this->Session->setFlash( 'The Post has been deleted!');
              
              $this->redirect('index');
            }
          }
        }
        
        public function findAllPosts(){
            return $this->Post->find('all');
        }
        
        	
       
    }

?>
