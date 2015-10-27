<div class="clientes view">
<h2><?php echo __('Cliente'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hash Session'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['hash_session']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clave Cifrar'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['clave_cifrar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sig Codigo'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['sig_codigo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cliente'), array('action' => 'edit', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cliente['Cliente']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('action' => 'add')); ?> </li>
	</ul>
</div>
