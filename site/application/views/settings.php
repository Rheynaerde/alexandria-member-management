<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('settings');
?>

<div id="body">

<?php

if(isset($message)){

?>

<span class="<?php if($is_error) { echo 'error_message'; } else { echo 'success_message'; } ?>">
<?php echo $message; ?>    
</span>

<?php
}
?>

<?php

echo form_open('user/change_password');

?>
<table>

<tbody>

<tr>
<td><?php echo $this->lang->line('settings.password.old'); ?></td>
<td><?php echo form_password('oldpass');?></td>
<td><?php echo form_error('oldpass'); ?></td>

</tr>
<tr>
<td><?php echo $this->lang->line('settings.password.new'); ?></td>
<td><?php echo form_password('newpass');?></td>
<td><?php echo form_error('newpass'); ?></td>

</tr>
<tr>
<td><?php echo $this->lang->line('settings.password.confirm'); ?></td>
<td><?php echo form_password('confirmpass');?></td>
<td><?php echo form_error('confirmpass'); ?></td>

</tr>
</tbody>
</table>

<button type="submit" name="submit"><?php echo $this->lang->line('settings.password.change'); ?></button>

<?php

echo form_close();

?>

</div>
