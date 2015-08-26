<title>Posts - iStock </title>
<?php
  echo $this->Session->flash();
?>


  <h1> Posts</h1>
  <table>
      <th>User ID</th>
      <th>Topic ID</th>
      <th>Body</th>
      <th>Created</th>
      <th>Modified</th>
      <th>Edit</th>
      <th>Delete</th>
      <?php foreach($posts as $post) : ?>
      <tr>
        <td><?php echo $this->HTML->link($post['Post']['id'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></td>
        <td><?php echo $this->HTML->link($post['Topic']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></td>
        <td><?php echo $post['Post']['body']; ?></td>
        <td><?php echo $post['Post']['created']; ?></td>
        <td><?php echo $post['Post']['modified']; ?></td>
        <td><?php echo $this->HTML->link('Edit', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id'])); ?></td>
        <td><?php echo $this->Form->postLink('Delete', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array('confirm' => 'Are you sure you want to delete this post?')); ?></td>  
      </tr>
      <?php endforeach; ?>
  </table>
  <?php unset($post); ?>