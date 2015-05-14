<?php $this->lang->load('admin/users'); ?>
<?php if($rights){ ?>
<a href="#" onclick="$('#mr_<?php echo $id ?>').load('<?php echo site_url('admin/users/remove_management/' . $id); ?>'); return false;"><?php echo $this->lang->line('admin/users.managementrights.remove'); ?></a>
<?php } else { ?>
<a href="#" onclick="$('#mr_<?php echo $id ?>').load('<?php echo site_url('admin/users/add_management/' . $id); ?>'); return false;"><?php echo $this->lang->line('admin/users.managementrights.add'); ?></a>
<?php } ?>