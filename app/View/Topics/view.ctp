<h1><b>TITLE:</b> <?php
 echo $topic['Topic']['title'];
?></h1>

<table>
 <th>Sr. No.</th>
 <th>User</th>
 <th>Post</th>
 
<?php
$counter = 1;
 foreach($topic['Post'] as $post) {
  echo "<tr><td>".$counter."</td><td>" . $post['user_id'] ."</td><td>".$post['body']."</td></tr>"; 
  $counter = $counter+1;
 }
?>

</table>

<?php echo $this->HTML->link('Create a post in this topic', array('controller' => 'posts', 'action' => 'add', $topic['Topic']['id'])); ?>
