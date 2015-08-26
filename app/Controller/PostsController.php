<?php

    class PostsController extends AppController{
        
        
        var $components =  array('Session');
    
        public function index(){
      
          $data = $this->Post->find('all');
          $this->set('posts', $data);
        }
    
        public function add($id){
            if($this->request->is('post')){
                
                $this->Post->create();
                $this->request->data['Post']['topic_id'] = $id;
                if($this->Post->save($this->request->data)){
                  $this->Session->setFlash( 'The Post has been created!');
                      
                  $this->redirect('index');
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
    }

?>
