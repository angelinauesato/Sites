<?php
  App::import('Controller', 'Users');
  App::import('Controller', 'Topics');
  App::import('Controller', 'Posts');
  App::import('Controller', 'Comments');
  

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
			 <?php 
              $user = new UsersController;
              $username = $user->getFullnameById( $post['Post']['user_id'] );
			 
				echo '<h2><b>'. $post['Post']['title'].'</b></h2><br />' ;
                echo '<spam class="date"> Published: '. $post['Post']['created'] . '<br />'.
                'Last updated:'. $post['Post']['modified'] . '<br />
                Created by:' .$username['User']['full_name']  .'</spam><br />';
				echo '<br /><p style="font-size: 1.2em;">'.$post['Post']['body']. '</p><br /><br />';
				echo '<b> Comments: </b>';
				foreach($post['Comment'] as $comment){
					if( isset($comment['post_id']) and $comment['post_id'] == $post['Post']['id']){
						echo '<br /> <br /><div style="border: solid;
        border-width: 1px;"><spam >' . $comment['body'] . '</spam> <br /></div>';
					}
					
				}
             ?>
		</div>
        </div>
	
	

</body>
</html>