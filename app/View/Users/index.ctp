<?php
  App::import('Controller', 'Users');
?>

<div>
	
<?php  echo $this->Session->flash(); ?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('full_name'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<?php if (AuthComponent::user('role') == '2') : ?>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
			<?php endif; ?>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<?php $user_controller = new UsersController; ?>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['full_name']); ?>&nbsp;</td>
		<td><?php echo h($user_controller->getRoleNameById($user['User']['role'])); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
		<?php if (AuthComponent::user('role') == '2') : ?>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
		</td>
		<?php endif; ?>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<br /> <?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?>
	<br />
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
