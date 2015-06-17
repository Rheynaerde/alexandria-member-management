<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('admin/transition');
$this->lang->load('sortabletable');
$this->load->helper('form');
?>

<script>
    $(function(){
        $("#transition_table").tablesorter({
            sortList: [[1,1]],
            widgets: ["zebra", "filter"],
            ignoreCase: true,
            widgetOptions : {
                filter_filteredRow : 'filtered',
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
    <?php
    echo form_open('admin/transition/do_create');
    echo form_submit('confirmation', $this->lang->line('admin/transition.overview.button.start_new_season'));
    echo form_close();
    ?>
    <table id="transition_table" class="sortable">
        <thead>
            <th style="min-width: <?php echo $this->lang->line('admin/transition.overview.member.minwidth'); ?>"><?php echo $this->lang->line('admin/transition.properties.member'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('admin/transition.overview.season.minwidth'); ?>"><?php echo $this->lang->line('admin/transition.properties.season'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('admin/transition.overview.state.minwidth'); ?>"><?php echo $this->lang->line('admin/transition.properties.state'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('admin/transition.overview.fee.minwidth'); ?>"><?php echo $this->lang->line('admin/transition.properties.fee'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('admin/transition.overview.minfee.minwidth'); ?>"><?php echo $this->lang->line('admin/transition.properties.minfee'); ?></th>
        </thead>
        <tbody>
<?php foreach ($transitions as $transition) { ?>
            <tr>
                <td><?php echo sprintf($this->lang->line('admin/transition.overview.name.format'), $transition->first_name, $transition->last_name); ?></td>
                <td><?php echo $transition->season; ?></td>
                <td><?php echo $this->lang->line('admin/transition.states.names.' . $transition->state); ?></td>
                <td><?php echo $this->config->item('alexandria.currency.symbol'); ?> <?php echo sprintf('%.2f', $transition->fee/100); ?></td>
                <td><?php echo $this->config->item('alexandria.currency.symbol'); ?> <?php echo sprintf('%.2f', $transition->minimum_fee/100); ?></td>
            </tr>
<?php } ?>
        </tbody>
    </table>
</div>
