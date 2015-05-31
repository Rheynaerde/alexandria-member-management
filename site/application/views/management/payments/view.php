<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('management/payments');
$this->lang->load('util');
?>

<div id="body">

    <table class="payment_data_table data_table">
        <thead>
            <tr>
                <th colspan="2"><?php echo $this->lang->line('management/payments.view.data'); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="property"><?php echo $this->lang->line('management/payments.properties.name'); ?></td>
                <td><?php echo $memo->name; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('management/payments.properties.date'); ?></td>
                <td><?php echo $memo->date; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('management/payments.properties.due_date'); ?></td>
                <td><?php echo $memo->due_date; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('management/payments.properties.amount'); ?></td>
                <td><?php echo $this->config->item('alexandria.currency.symbol'); ?> <?php echo sprintf('%.2f', $memo->amount/100); ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('management/payments.properties.giro_description'); ?></td>
                <td><?php echo $memo->giro_description; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('management/payments.properties.description'); ?></td>
                <td><?php echo $memo->description; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('management/payments.properties.paid_status'); ?></td>
                <td><?php echo $memo->is_paid ?
                        $this->lang->line('management/payments.properties.paid_status.yes') : 
                        $this->lang->line('management/payments.properties.paid_status.no'); ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('management/payments.properties.cancelled'); ?></td>
                <td><?php echo $memo->is_cancelled ? 
                        $this->lang->line('util.yes') : $this->lang->line('util.no'); ?></td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th colspan="2"><?php echo $this->lang->line('management/payments.view.items'); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <table class="memo_view_items">
                        <thead>
                            <tr>
                                <th width="30"><?php echo $this->lang->line('management/payments.properties.item.item'); ?></th>
                                <th><?php echo $this->lang->line('management/payments.properties.item.description'); ?></th>
                                <th width="50"><?php echo $this->lang->line('management/payments.properties.item.amount'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

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
                                <td class="memo_view_items_amount"><?php echo $this->config->item('alexandria.currency.symbol'); ?> <?php echo sprintf('%.2f', $item->amount/100); ?></td>
                            </tr>
                            <?php
                                $i++;
                            } ?>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th colspan="2"><?php echo $this->lang->line('management/payments.view.history'); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <table class="memo_view_history">
                        <tbody>

                            <?php
                            $i = 1;
                            foreach ($history as $history_entry) {?>

                            <tr class="<?php echo ($i % 2 == 0) ? 'even_row' : 'odd_row'; ?>">
                                <td class="no_break no_wrap"><?php echo $history_entry->timestamp; ?></td>
                                <td><?php echo $history_entry->username; ?></td>
                                <td><?php
                                if($history_entry->old_is_paid != $history_entry->new_is_paid){
                                    if($history_entry->new_is_paid){
                                        echo $this->lang->line('management/payments.view.history.paid');
                                    } else {
                                        echo $this->lang->line('management/payments.view.history.notpaid');
                                    }
                                    ?><br>
                                    <?php
                                }
                                
                                if($history_entry->old_is_cancelled != $history_entry->new_is_cancelled){
                                    if($history_entry->new_is_cancelled){
                                        echo $this->lang->line('management/payments.view.history.cancelled');
                                    } else {
                                        echo $this->lang->line('management/payments.view.history.notcancelled');
                                    }
                                    ?><br>
                                    <?php
                                }
                                
                                $fields = array('date', 'due_date', 'name', 'description', 'giro_description');
                                $changed_fields = array();
                                foreach ($fields as $field){
                                    if($history_entry->{'new_' . $field} != $history_entry->{'old_' . $field}){
                                        $changed_fields[] = $this->lang->line('management/payments.field.' . $field);
                                    }
                                }
                                if($changed_fields){
                                    //array is not empty
                                    echo $this->lang->line('management/payments.view.history.contentchanged') . ': ' . implode(', ', $changed_fields);
                                }
                                ?>
                                </td>
                            </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>
