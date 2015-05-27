<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('management/payments');
$this->lang->load('sortabletable');
$this->lang->load('datepicker');
?>

<script>
    $(function(){
        $("#memo_table").tablesorter({
            sortList: [[1,0]],
            widgets: ["zebra", "filter"],
            ignoreCase: true,
            widgetOptions : {
                filter_filteredRow : 'filtered',
                filter_formatter : {
                    1 : function($cell, indx){
                        return $.tablesorter.filterFormatter.uiDatepicker( $cell, indx, {
                            monthNamesShort: [<?php echo $this->lang->line('datepicker.months.short'); ?>],
                            dayNamesMin: [<?php echo $this->lang->line('datepicker.days.min'); ?>],
                            yearRange: "1900:c",
                            dateFormat: "yy-mm-dd",
                            textFrom: '<?php echo $this->lang->line('sortabletable.date.from'); ?>',
                            textTo: '<?php echo $this->lang->line('sortabletable.date.to'); ?>',
                            firstDay: <?php echo $this->lang->line('datepicker.firstday'); ?>,
                            changeMonth: true,
                            changeYear : true
                        });
                    }
                },
                filter_hideFilters : false,
                filter_ignoreCase : true,
                filter_liveSearch : true,
                filter_onlyAvail : 'filter-onlyAvail',
                filter_reset : 'button.reset',
                filter_saveFilters : true,
                filter_searchDelay : 300,
                filter_searchFiltered: true,
                filter_startsWith : true,
                filter_useParsedData : false,
                filter_defaultAttrib : 'data-value'
            }
        });
    });
</script>

<div id="body">
    <table id="memo_table" class="sortable">
        <thead>
            <th style="min-width: <?php echo $this->lang->line('management/payments.overview.name.minwidth'); ?>"><?php echo $this->lang->line('management/payments.properties.name'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('management/payments.overview.due_date.minwidth'); ?>"><?php echo $this->lang->line('management/payments.properties.due_date'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('management/payments.overview.amount.minwidth'); ?>"><?php echo $this->lang->line('management/payments.properties.amount'); ?></th>
        </thead>
        <tbody>
<?php foreach ($memos as $memo) { ?>
            <tr>
                <td><?php echo $memo->name; ?></td>
                <td><?php echo $memo->due_date; ?></td>
                <td><?php echo sprintf('%.2f', $memo->amount/100); ?></td>
                <td class="action">
                    <a href="<?php echo site_url('pdf/payments/memo/' . $memo->id . '/' . sprintf($this->lang->line('management/payments.overview.filename.format'), $memo->id)); ?>"><?php echo $this->lang->line('management/payments.overview.as_pdf'); ?></a>
                </td>
            </tr>
<?php } ?>
        </tbody>
    </table>
</div>
