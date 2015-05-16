<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('admin/seasons');
?>

<!-- BEGIN TOOLBAR -->

<div id="season_list_toolbar" class="toolbar">
    <a href="<?php echo site_url('/admin/seasons/create'); ?>"><button type="button"><?php echo $this->lang->line('admin/seasons.overview.new'); ?></button></a>
</div>

<!-- END TOOLBAR -->
