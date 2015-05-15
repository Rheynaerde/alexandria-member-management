<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('admin/seasons');
$this->lang->load('datepicker');
?>

<div id="body">

<?php
if($error){
?>

<span class="error_message">
<?php echo $message; ?>    
</span>

<?php
}
?>

<?php

echo form_open('admin/seasons/do_create');

?>
<table>

<tbody>

<tr>
<td><?php echo $this->lang->line('admin/seasons.properties.name'); ?></td>
<td><?php echo form_input('name', set_value('name'));?></td>
<td><?php echo form_error('name'); ?></td>
</tr>

<tr>
<td><?php echo $this->lang->line('admin/seasons.properties.begin'); ?></td>
<td><?php 
$begin_data = array(
    'name'=> 'begin',
    'id' => 'begin_date',
    'placeholder' => $this->lang->line('admin/seasons.create.begin.placeholder'));
echo form_input($begin_data, set_value('begin'));
?></td>
<td><?php echo form_error('begin'); ?></td>
</tr>

<tr>
<td><?php echo $this->lang->line('admin/seasons.properties.end'); ?></td>
<td><?php 
$end_data = array(
    'name'=> 'end',
    'id' => 'end_date',
    'placeholder' => $this->lang->line('admin/seasons.create.end.placeholder'));
echo form_input($end_data, set_value('end'));
?></td>
<td><?php echo form_error('end'); ?></td>
</tr>

<tr>
<td><?php echo $this->lang->line('admin/seasons.properties.previous'); ?></td>
<td><?php echo form_dropdown('previous', $seasons, '-1');?></td>
<td><?php echo form_error('previous'); ?></td>
</tr>

<tr>
<td><?php echo $this->lang->line('admin/seasons.properties.next'); ?></td>
<td><?php echo form_dropdown('next', $seasons, '-1');?></td>
<td><?php echo form_error('next'); ?></td>
</tr>
</tbody>
</table>

<button type="submit" name="submit"><?php echo $this->lang->line('admin/seasons.create.submit'); ?></button>

<?php

echo form_close();

?>

<script>
$(function() {
    var datepickerconfig = {
        monthNamesShort: [<?php echo $this->lang->line('datepicker.months.short'); ?>],
        dayNamesMin: [<?php echo $this->lang->line('datepicker.days.min'); ?>],
        firstDay: <?php echo $this->lang->line('datepicker.firstday'); ?>,
        yearRange: "1900:c+3",
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear : true};
    $("#begin_date").datepicker(datepickerconfig);
    $("#end_date").datepicker(datepickerconfig);
});
</script>

</div>
