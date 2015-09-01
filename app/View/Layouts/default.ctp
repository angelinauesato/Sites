<?php
  App::import('Controller', 'Users');

$cakeDescription = __d('cake_dev', 'iStock Sample Project');
$cakeVersion = __d('cake_dev', 'by Angelina Uesato Oshiro')
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $cakeDescription; ?></h1>
		</div>
		
		<div id="content">
		<?php echo $this->Session->flash();
		?>
			<div id="menu">

		<?php
			if(AuthComponent::user()) : {
?>

			 <?php echo $this->HTML->link('Home', array('controller' => 'pages', 'action' => 'index')); ?> |
			 
			 <?php echo $this->HTML->link('Posts', array('controller' => 'posts', 'action' => 'index')); ?> |
			 
			 <?php echo $this->HTML->link('Topics', array('controller' => 'topics', 'action' => 'index')); ?> |
			 
			 <?php echo $this->HTML->link('Users', array('controller' => 'users', 'action' => 'index')); ?> |
			 
			 <?php echo $this->HTML->link('Coments', array('controller' => 'topics', 'action' => 'index')); ?> |
			   
  
<?php
 }
		endif;
	?>
	
	<div id="in_out">
	<?php
    if(AuthComponent::user()){
      echo $this->HTML->link('Logout', array('controller' => 'users', 'action' => 'logout'));
    }else{
      echo $this->HTML->link('Login', array('controller' => 'users', 'action' => 'login')) . ' or ' .
       $this->HTML->link('Register', array('controller' => 'users', 'action' => 'add'));
    }
  ?>
  </div>
		</div>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>

</body>
</html>
