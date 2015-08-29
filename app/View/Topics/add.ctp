<h1>Create Topic</h1>
<?php
  echo $this->Form->create('Topic');
  //echo $this->Form->input('user_id');
  echo $this->Form->input('title');
    if (AuthComponent::user('role') == '2') : 
  echo $this->Form->select('visible', array('1' => 'Published', '0' => 'Hidden'),
                           array('empty' => false));
  endif;
  echo $this->Form->end('Save topic');
  
?>