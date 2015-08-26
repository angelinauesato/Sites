<?php
  
  class TopicsController extends AppController{
  
    var $components =  array('Session');
    
    public function index(){
      
      $this->set('blog', 'iSotck Sample');
    
    }
    
    public function add(){
      
      if($this->request->is('post')){
        
        $this->Topic->create();
        if($this->Topic->save($this->request->data)){
          $this->Session->setFlash( 'The Topic has been created!');
          
          $this->redirect('index');
        }
      }
    }
  
  }
?>