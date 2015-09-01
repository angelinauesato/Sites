<?php
  App::import('Controller', 'Users');
  App::import('Controller', 'Topics');
  App::import('Controller', 'Posts');
  

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
           
            
        
		<div id="column">
			<p><b>Users</b></p>
			<b>Authors</b> <br/>
            <?php $user_a = new UsersController;
			$authors = $user_a->findUsersByRole("3");
			foreach($authors as $author) : {
				echo $author['User']['full_name'];
			} endforeach;
			unset($authors); ?>
			
			<br /><b>Readers</b><br />
			
            <?php $user_r = new UsersController;
			$readers = $user_r->findUsersByRole("1");
			
			foreach($readers as $reader) : {
				echo $reader['User']['full_name'] ;
			} endforeach; ?>
			
			<br /> <br /><p><b>Topics</b></p>
			
            <?php $t = new TopicsController;
			$topics = $t->Topic->find('all');
			
			foreach($topics as $topic) : {
				echo $topic['Topic']['title']." (".($this->HTML->link(count($topic['Post']), array('controller' => 'topics', 'action' => 'view', $topic['Topic']['id']))). ")<br />" ;
			} endforeach; ?>
        </div>
		<div id="body">
			 <?php $p = new PostsController;
			$posts = $p->findAllPosts();
			foreach($posts as $post) : {
				echo '<h2><b>'. $post['Post']['title'].'</b></h2></b><br />' ;
				echo '<p style="font-size: 1.1em;">'.substr($post['Post']['body'],0,150). '...' . ($this->HTML->link('Read More', array('controller' => 'posts', 'action' => 'view', $post['Post']['id']))) .'</p><br /><br /><br /><br />';
				
			} endforeach; ?>
		</div>
        </div>
	
	

</body>
</html>