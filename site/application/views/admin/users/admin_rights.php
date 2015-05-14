<?php $this->lang->load('admin/users'); ?>
<?php if($rights){ ?>
<a href="#" onclick="$('#ar_<?php echo $id ?>').load('<?php echo site_url('admin/users/remove_admin/' . $id); ?>'); return false;"><?php echo $this->lang->line('admin/users.adminrights.remove'); ?></a>
<?php } else { ?>
<a href="#" onclick="$('#ar_<?php echo $id ?>').load('<?php echo site_url('admin/users/add_admin/' . $id); ?>'); return false;"><?php echo $this->lang->line('admin/users.adminrights.add'); ?></a>
<?php } ?>