<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('families');
$this->lang->load('sortabletable');
?>

<script>
    $(function(){
        $("#families_table").tablesorter({
            sortList: [[0,0]],
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
    <table id="families_table" class="sortable">
        <thead>
            <th style="min-width: <?php echo $this->lang->line('families.overview.name.minwidth'); ?>"><?php echo $this->lang->line('families.properties.name'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('families.overview.description.minwidth'); ?>" class="sorter-false"><?php echo $this->lang->line('families.properties.description'); ?></th>
        </thead>
        <tbody>
<?php foreach ($families as $family) { ?>
            <tr>
                <td><a href="<?php echo site_url('families/view/' . $family->id); ?>"><?php echo $family->name; ?></a></td>
                <td><?php echo $family->description; ?></td>
            </tr>
<?php } ?>
        </tbody>
    </table>
</div>
