<h1>Create a new post</h1>
<?php
  echo $this->Form->create('Post');
  //echo $this->Form->input('user_id');
  echo $this->Form->input('title');
  echo $this->Form->input('body');
  echo $this->Form->end('Create Post');
  
?>