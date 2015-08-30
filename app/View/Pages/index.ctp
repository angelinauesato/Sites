<?php
 App::import('Controller', 'Users');
  App::import('Controller', 'Topics');
 App::uses('String', 'Utility');

$cakeDescription = __d('cake_dev', 'iStock Sample Project');
$cakeVersion = __d('cake_dev', 'by Angelina Uesato Oshiro')
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->Html->css('pages_index');
        
        
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    <br />
    <br />
    
        <div id="everything">
            
            <p>TUDO</p>
        <div id="column">
			<p><b>Users</b></p>
			<b>Authors</b> <br/>
            <?php $user_a = new UsersController;
			$authors = $user_a->findUsersByRole("3");
			foreach($authors as $author) : {
				echo $author['User']['full_name']." (".($this->HTML->link(count($author['Post']), array('controller' => 'posts', 'action' => 'view', $author['User']['id']))). ")<br />" ;
			} endforeach;
			unset($authors); ?>
			
			<br /><b>Readers</b><br />
			
            <?php $user_r = new UsersController;
			$readers = $user_r->findUsersByRole("1");
			//$readers = $user_r->User->query( 'Select * from users WHERE role = 1;' );
			
			foreach($readers as $reader) : {
				//print_r($reader);
				echo $reader['User']['full_name']." (".($this->HTML->link(count($reader['Post']), array('controller' => 'posts', 'action' => 'view', $reader['User']['id']))). ")<br />" ;
			} endforeach; ?>
			
			<br /> <p><b>Topics</b></p>
			
            <?php $t = new TopicsController;
			$topics = $t->Topic->find('all');
			//$readers = $user_r->User->query( 'Select * from users WHERE role = 1;' );
			
			foreach($topics as $topic) : {
				//print_r($reader);
				echo $topic['Topic']['title']." (".($this->HTML->link(count($topic['Post']), array('controller' => 'posts', 'action' => 'view', $topic['Topic']['id']))). ")<br />" ;
			} endforeach; ?>
        </div>
		<div id="body">
			
		</div>
        </div>
	
	

</body>
</html>