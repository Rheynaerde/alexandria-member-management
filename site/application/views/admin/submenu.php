<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('admin/submenu');
?>

<!-- BEGIN ADMIN SUBMENU -->

<div id="submenu-container">
<ul class="navigation-submenu">
   <li class="navigation-submenu-item"><a href="<?php echo site_url('admin/users'); ?>" class="navigation-item"><?php echo $this->lang->line('admin/submenu.users'); ?></a></li>
   <li class="navigation-submenu-item"><a href="" class="navigation-item"><?php echo $this->lang->line('admin/submenu.seasons'); ?></a></li>
</ul>
</div>

<!-- END ADMIN SUBMENU -->
