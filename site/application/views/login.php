<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('login');
?>

<div id="body">

<p><?php echo $this->lang->line('login.message'); ?></p>

<?php if (isset($error) && $error): ?>
<p class="error"><?php echo $this->lang->line('login.error'); ?></p>
<?php endif; ?>

<?php echo form_open('login/do_login') ?>
<input type="text" id="name" name="name" placeholder="<?php echo $this->lang->line('login.username'); ?>">
<input type="password" id="password" name="password" placeholder="<?php echo $this->lang->line('login.password'); ?>">

<button type="submit" name="submit"><?php echo $this->lang->line('login.login'); ?></button>

</form>

</div>
