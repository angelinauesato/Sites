<?php  echo $this->Session->flash();
?>
<br />

  
  <?php  ?>
<br />
  <h1> Topics</h1>
  <table>
      <th>Title</th>
      <th>Username</th>
      
      <th>Created</th>
      <th>Modified</th>
      <?php if (AuthComponent::user('role') == '2') : ?>
      <th>Published</th>
      <th>Edit</th>
      <th>Delete</th>
      <?php endif; ?> 
      <?php foreach($topics as $topic) : ?>
      
      
       <tr>
       
        
        <td><?php echo $this->HTML->link($topic['Topic']['title'], array('controller' => 'topics', 'action' => 'view', $topic['Topic']['id'])); ?></td>
        <td><?php echo $topic['User']['username']; ?></td>
        <td><?php echo $topic['Topic']['created']; ?></td>
        <td><?php echo $topic['Topic']['modified']; ?></td>
        <?php if (AuthComponent::user('role') == '2') : ?>
        <td><?php echo ($topic['Topic']['visible'] == 1) ? 'Visible' : 'Hidden' ?></td>
        <td><?php echo $this->HTML->link('Edit', array('controller' => 'topics', 'action' => 'edit', $topic['Topic']['id'])); ?></td>
        <td><?php echo $this->Form->postLink('Delete', array('controller' => 'topics', 'action' => 'delete', $topic['Topic']['id']), array('confirm' => 'Are you sure you want to delete this topic?')); ?></td>  
     <?php endif; ?>
       </tr>
      
      
      <?php endforeach; ?>
  </table>
  <br />
  <?php
  if(AuthComponent::user() and (intval(AuthComponent::user('role')) == 2 or intval(AuthComponent::user('role')) == 3)) {
    echo $this->HTML->link('Create a new topic', array('controller' => 'topics', 'action' => 'add'));
  }
   ?>

  <?php unset($topic); ?>