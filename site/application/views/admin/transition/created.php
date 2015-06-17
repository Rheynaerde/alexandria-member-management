<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('admin/transition');
?>

<div id="body">

    <p>
    <span class="<?php if($creation_count > 0) { echo 'success_message'; } else { echo 'error_message'; } ?>">
    <?php
    if($creation_count > 1){
        echo sprintf($this->lang->line('admin/transition.created.success.multiple.format'),$creation_count);
    } else if($creation_count == 1){
        echo $this->lang->line('admin/transition.created.success.one');
    } else {
        echo $this->lang->line('admin/transition.created.failure');
    }
    ?>
    </span>
    </p>

    <a href="<?php echo site_url('admin/transition'); ?>"><?php echo $this->lang->line('admin/transition.created.to_overview'); ?></a>
</div>
