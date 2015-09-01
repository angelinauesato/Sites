<h1>Create a new post</h1>
<?php
  echo $this->Form->create('Post');
  
  echo $this->Form->input('topic_id', isset( $this->request->params['pass'][0]) ? array('default'=>$this->request->params['pass'][0]) : array('default' => ''));
  echo $this->Form->input('title');
  echo $this->Form->input('body');
  echo $this->Form->end('Create Post');
  
?>
