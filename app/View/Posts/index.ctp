<title>Posts - iStock </title>
<?php
  echo $this->Session->flash();
?>


  <h1> Posts</h1>
  <table>
      <th>Post ID</th>
      <th>Topic ID</th>
      <th>Title</th>
      <th>Body</th>
      <th>Created</th>
      <th>Modified</th>
      <th>Edit</th>
      <th>Delete</th>
      <?php foreach($posts as $post) : ?>
      <tr>
        <td><?php echo $this->HTML->link($post['Post']['id'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></td>
        <td><?php echo $this->HTML->link($post['Topic']['title'], array('controller' => 'topics', 'action' => 'view', $post['Post']['id'])); ?></td>
        <td><?php echo $post['Post']['title']; ?></td>
        <td><?php echo substr($post['Post']['body'], 0, 100); ?></td>
        <td><?php echo $post['Post']['created']; ?></td>
        <td><?php echo $post['Post']['modified']; ?></td>
        
        
        <?php
        
        if(AuthComponent::user() and (intval(AuthComponent::user('role')) == 2 or intval(AuthComponent::user('id')) == intval($post['Post']['user_id'])))  {?>
        <td><?php echo $this->HTML->link('Edit', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id'])); ?></td>
        <td><?php echo $this->Form->postLink('Delete', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array('confirm' => 'Are you sure you want to delete this post?')); ?></td>
        <?php } else {  ?>
          <td> - </td>
          <td> - </td>
          <?php }?>
      </tr>
      <?php endforeach; ?>
  </table>
  <?php unset($post); ?>
  <br />
  <?php
  if(AuthComponent::user() and (intval(AuthComponent::user('role')) == 2 or intval(AuthComponent::user('role')) == 3)) {
    echo $this->HTML->link('Create a new post', array('controller' => 'posts', 'action' => 'add'));
  }
   ?>