<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('management/submenu');
?>

<!-- BEGIN MANAGEMENT SUBMENU -->

<div id="submenu-container">
<ul class="navigation-submenu">
   <li class="navigation-submenu-item"><a href="<?php echo site_url('management/mail'); ?>" class="navigation-item"><?php echo $this->lang->line('management/submenu.mail'); ?></a></li>
</ul>
</div>

<!-- END MANAGEMENT SUBMENU -->
