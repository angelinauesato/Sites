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
            <div id="body">
			 <?php $p = new PostsController;
			$posts = $p->findAllPosts();
			foreach($posts as $post) : {
				echo '<b>'. $post['Post']['title'].'</b><br />' ;
				echo substr($post['Post']['body'],0,1000). '...<br /><br /><br /><br />';
				
			} endforeach; ?>
		</div>
        </div>
	
	

</body>
</html>