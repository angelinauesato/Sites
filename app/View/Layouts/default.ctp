<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'iStock Sample Project hehhehe');
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

			 <?php echo $this->HTML->link('Home', array('controller' => 'topics', 'action' => 'index')); ?> |
			 
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
