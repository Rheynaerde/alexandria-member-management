<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('admin/seasons');
?>

<!-- BEGIN TOOLBAR -->

<div id="season_view_toolbar" class="toolbar">
    <a href="<?php echo site_url('admin/seasons/members/' . $season->id); ?>"><button type="button"><?php echo $this->lang->line('admin/seasons.view.members'); ?></button></a>
</div>

<!-- END TOOLBAR -->
