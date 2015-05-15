<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('admin/seasons');
$this->lang->load('sortabletable');
$this->lang->load('datepicker');
?>

<script>
    $(function(){
        $("#season_table").tablesorter({
            sortList: [[1,1]],
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
                    },
                    2 : function($cell, indx){
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
    <table id="season_table" class="sortable">
        <thead>
            <th style="min-width: <?php echo $this->lang->line('admin/seasons.overview.name.minwidth'); ?>"><?php echo $this->lang->line('admin/seasons.properties.name'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('admin/seasons.overview.begin.minwidth'); ?>"><?php echo $this->lang->line('admin/seasons.properties.begin'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('admin/seasons.overview.end.minwidth'); ?>"><?php echo $this->lang->line('admin/seasons.properties.end'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('admin/seasons.overview.previous.minwidth'); ?>"><?php echo $this->lang->line('admin/seasons.properties.previous'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('admin/seasons.overview.next.minwidth'); ?>"><?php echo $this->lang->line('admin/seasons.properties.next'); ?></th>
        </thead>
        <tbody>
<?php foreach ($seasons as $season) { ?>
            <tr>
                <td><?php echo $season->name; ?></td>
                <td><?php echo $season->begin; ?></td>
                <td><?php echo $season->end; ?></td>
                <td><?php echo $season->previous; ?></td>
                <td><?php echo $season->next; ?></td>
            </tr>
<?php } ?>
        </tbody>
    </table>
</div>
