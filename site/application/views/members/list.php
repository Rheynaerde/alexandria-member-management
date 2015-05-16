<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('members');
$this->lang->load('sortabletable');
$this->lang->load('datepicker');
?>

<script>
    $(function(){
        $("#member_table").tablesorter({
            sortList: [[0,0],[2,0]],
            widgets: ["zebra", "filter"],
            ignoreCase: true,
            widgetOptions : {
                filter_filteredRow : 'filtered',
                filter_formatter : {
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
    <a href="<?php echo site_url('pdf/members/overview'); ?>"><button type="button"><?php echo $this->lang->line('members.overview.download'); ?></button></a>
    <table id="member_table" class="sortable">
        <thead>
            <th style="min-width: <?php echo $this->lang->line('members.overview.lastname.minwidth'); ?>"><?php echo $this->lang->line('members.properties.lastname'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('members.overview.firstname.minwidth'); ?>"><?php echo $this->lang->line('members.properties.firstname'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('members.overview.birthdate.minwidth'); ?>"><?php echo $this->lang->line('members.properties.birthdate'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('members.overview.gender.minwidth'); ?>" class="sorter-false filter-select"><?php echo $this->lang->line('members.properties.gender'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('members.overview.hand.minwidth'); ?>" class="sorter-false filter-select"><?php echo $this->lang->line('members.properties.hand'); ?></th>
        </thead>
        <tbody>
<?php foreach ($members as $member) { ?>
            <tr>
                <td><a href="<?php echo site_url('members/view/' . $member->id); ?>"><?php echo $member->lastName; ?></a></td>
                <td><a href="<?php echo site_url('members/view/' . $member->id); ?>"><?php echo $member->firstName; ?></a></td>
                <td><?php echo $member->birthdate; ?></td>
                <td><?php echo $this->lang->line('members.properties.gender.' . $member->gender); ?></td>
                <td><?php echo $this->lang->line('members.properties.hand.' . $member->hand); ?></td>
            </tr>
<?php } ?>
        </tbody>
    </table>
</div>
