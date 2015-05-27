<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('pdf/payments');

?>
<html>
    <head>
	<?php echo link_tag(base_url().'css/print_general.css'); ?>
	<?php echo link_tag(base_url().'css/print_payment_memo.css'); ?>
        <style>
            body {
                margin-top: 10px;
            }
        </style>
</head>

<body>

<div id="body">

<div id="section_header">
</div>

<div id="content">
  
<div class="page" style="font-size: 10pt">

<table style="width: 100%; font-size: 10pt;">
<tr>
<?php if($this->config->item('alexandria.payment_memo.logo.include')) { ?>
<td rowspan="2" width="200"><img src="<?php echo base_url(); ?>images/<?php echo $this->config->item('alexandria.payment_memo.logo.filename'); ?>" height="200"></td>
<?php } ?>
<td style="vertical-align: top"><?php echo $this->config->item('alexandria.payment_memo.address'); ?></td>
</tr>
<tr>
<td style="font-size: 18pt; font-weight: bold;"><?php echo $memo->name; ?></td>
</tr>
</table>

<?php
if(isset($memo->description) && strlen(trim($memo->description)) > 0) {
?>
<div class="payment_description" style="font-size: 10pt; text-align: justify">
    <?php echo $memo->description; ?>
</div>
<?php
}
?>

<table class="payment_items">

<tr><td colspan="3"><h2><?php echo $this->lang->line('pdf/payments.memo.overview'); ?></h2></td></tr>

<tbody>
<tr>
<th width="30"><?php echo $this->lang->line('pdf/payments.memo.item'); ?></th>
<th><?php echo $this->lang->line('pdf/payments.memo.description'); ?></th>
<th width="50"><?php echo $this->lang->line('pdf/payments.memo.total'); ?></th>
</tr>

<?php
$i = 1;
foreach ($items as $item) {?>
    
<tr class="<?php echo ($i % 2 == 0) ? 'even_row' : 'odd_row'; ?>" <?php
if($item->is_cancelled){
    echo 'style="text-decoration: line-through;"';
}
?>>
<td style="text-align: center"><?php echo $i; ?></td>
<td><?php echo $item->description; ?></td>
<td class="payment_total"><?php echo $this->config->item('alexandria.currency.symbol'); ?> <?php echo sprintf('%.2f', $item->amount/100); ?></td>
</tr>
<?php
    $i++;
} ?>

</tbody>




<tr>
<td colspan="2" style="text-align: right;"><strong><?php echo $this->lang->line('pdf/payments.memo.grand_total'); ?>:</strong></td>
<td class="payment_total"><strong><?php echo $this->config->item('alexandria.currency.symbol'); ?> <?php echo sprintf('%.2f', $memo->amount/100); ?></strong></td></tr>
</table>

<div class="payment_text" style="font-size: 10pt; text-align: justify">
<?php
if(isset($memo->due_date)){
    $due_date = explode('-', $memo->due_date);
    echo sprintf($this->lang->line('pdf/payments.memo.message.format.with_date'),
            $memo->giro_description, 
            date(
                $this->lang->line('pdf/payments.memo.message.date_format'), 
                mktime(12, 0, 0, $due_date[1], $due_date[2], $due_date[0])),
            $this->config->item('alexandria.payment_memo.clubname'),
            $this->config->item('alexandria.payment_memo.accountnumber'));
} else {
    echo sprintf($this->lang->line('pdf/payments.memo.message.format.no_date'),
            $memo->giro_description,
            $this->config->item('alexandria.payment_memo.clubname'),
            $this->config->item('alexandria.payment_memo.accountnumber'));
}
?>
</div>

</div>

</div>
</div>

</body>
</html>