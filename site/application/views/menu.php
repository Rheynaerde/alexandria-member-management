<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('menu');
?>

<!-- BEGIN MENU -->

<div id="menu-container">
<ul class="navigation-menu">
   <li class="navigation-menu-item"><a href="<?php echo site_url('members/overview'); ?>" class="navigation-item"><?php echo $this->lang->line('menu.members'); ?></a></li>
   <li class="navigation-menu-item-right"><a href="<?php echo site_url('login/logout'); ?>" class="navigation-item"><?php echo $this->lang->line('menu.signout'); ?></a></li>
   <li class="navigation-menu-item-right"><a href="<?php echo site_url('user/settings'); ?>" class="navigation-item"><?php echo $this->lang->line('menu.settings'); ?></a></li>
   <li class="navigation-menu-item-right"><a href="<?php echo site_url('admin/main'); ?>" class="navigation-item"><?php echo $this->lang->line('menu.admin'); ?></a></li>
</ul>
</div>

<!-- END MENU -->
