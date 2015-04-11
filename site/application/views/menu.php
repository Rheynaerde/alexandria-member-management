<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('menu');
?>

<!-- BEGIN MENU -->

<div id="menu-container">
<ul class="navigation-menu">
   <li class="navigation-menu-item-right"><a href="<?php echo site_url('login/logout'); ?>" class="navigation-item"><?php echo $this->lang->line('menu.signout'); ?></a></li>
</ul>
</div>

<!-- END MENU -->
