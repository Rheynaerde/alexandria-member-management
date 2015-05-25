<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('management/mail');
?>

<div id="body">

<p>
    <?php echo $this->lang->line('management/mail.lists'); ?>:
    <a href="<?php echo site_url('management/mail'); ?>"><?php echo $this->lang->line('management/mail.lists.active'); ?></a>,
    <a href="<?php echo site_url('management/mail/former'); ?>"><?php echo $this->lang->line('management/mail.lists.former'); ?></a>
</p>

<?php 
$first = true;
foreach ($mails as $maildata) { 
    if(!$first){
        ?>, <br><?php
    }
    $first = false;
    ?>
    "<?php
    if(isset($maildata->comment) && strlen(trim($maildata->comment))>0){
        echo sprintf($this->lang->line('management/mail.description.format'), 
                $maildata->first_name, $maildata->last_name, $maildata->comment);
    } else {
        echo sprintf($this->lang->line('management/mail.description.format.nocomment'), 
                $maildata->first_name, $maildata->last_name);
    }
    ?>" &lt;<?php echo $maildata->mailaddress; ?>&gt;<?php } ?>

</div>
