<div class="comments form">
<?php echo $this->Form->create('Comment'); ?>
	<fieldset>
		<legend><?php echo __('Add Comment'); ?></legend>
	<?php
		echo $this->Form->input('post_id');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
