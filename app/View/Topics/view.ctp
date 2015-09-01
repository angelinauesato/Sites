<?php
  App::import('Controller', 'Users');
?>

<h1><b>TITLE:</b> <?php
 echo $topic['Topic']['title'];
?></h1>

<table>
 <th>Serial No.</th>
 <th>User</th>
 <th>Title</th>
 
<?php
$counter = 1;
if(count($topic['Post'])==0){
 
 echo '<tr><td colspan="3" style="text-align:center"> No data(s) found!</td></tr>';
}else{
 
  foreach($topic['Post'] as $post) {
   $user = new UsersController;
   $username = $user->getUsernameById( $post['user_id'] );
  
   echo "<tr><td>".$counter."</td><td>" .( isset($username['User']['username']) ? $username['User']['username'] : ' - ') ."</td><td>".$post['title']."</td></tr>"; 
   $counter = $counter+1;
  }
}?>

</table>

<?php if(AuthComponent::user() and AuthComponent::user('role') <> 1){ echo $this->HTML->link('Create a post in this topic', array('controller' => 'posts', 'action' => 'add', $topic['Topic']['id']));} ?>
