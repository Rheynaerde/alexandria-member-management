<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('members');
?>

<!-- BEGIN TOOLBAR -->

<div id="list_toolbar" class="toolbar">
    <a href="<?php echo site_url('pdf/members/overview'); ?>"><button type="button"><?php echo $this->lang->line('members.overview.download'); ?></button></a>
</div>

<!-- END TOOLBAR -->
