<?php $this->lang->load('admin/users'); ?>
<?php if($state){ ?>
<a href="#" onclick="$('#act_<?php echo $id ?>').load('<?php echo site_url('admin/users/deactivate/' . $id); ?>'); return false;"><?php echo $this->lang->line('admin/users.deactivate'); ?></a>
<?php } else { ?>
<a href="#" onclick="$('#act_<?php echo $id ?>').load('<?php echo site_url('admin/users/activate/' . $id); ?>'); return false;"><?php echo $this->lang->line('admin/users.activate'); ?></a>
<?php } ?>