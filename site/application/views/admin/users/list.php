<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('admin/users');
$this->lang->load('sortabletable');
?>

<script>
    $(function(){
        $("#user_table").tablesorter({
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
    <table id="user_table" class="sortable">
        <thead>
            <th style="min-width: <?php echo $this->lang->line('admin/users.overview.username.minwidth'); ?>"><?php echo $this->lang->line('admin/users.properties.username'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('admin/users.overview.lastname.minwidth'); ?>"><?php echo $this->lang->line('admin/users.properties.lastname'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('admin/users.overview.firstname.minwidth'); ?>"><?php echo $this->lang->line('admin/users.properties.firstname'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('admin/users.overview.email.minwidth'); ?>"><?php echo $this->lang->line('admin/users.properties.email'); ?></th>
        </thead>
        <tbody>
<?php foreach ($query->result() as $row) { ?>
            <tr>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->last_name; ?></td>
                <td><?php echo $row->first_name; ?></td>
                <td><?php echo $row->email; ?></td>
                <td class="action">
                    <div id="mr_<?php echo $row->id; ?>"><?php 
                    $this->view('admin/users/management_rights', array(
                        'rights' => $row->has_member_management_rights,
                        'id' => $row->id)); ?></div>
                </td>
                <td class="action">
                    <div id="ar_<?php echo $row->id; ?>"><?php 
                    $this->view('admin/users/admin_rights', array(
                        'rights' => $row->is_admin,
                        'id' => $row->id)); ?></div>
                </td>
                <td class="action">
                    <div id="act_<?php echo $row->id; ?>"><?php 
                    $this->view('admin/users/activate', array(
                        'state' => $row->is_active,
                        'id' => $row->id)); ?></div>
                </td>
            </tr>
<?php } ?>
        </tbody>
    </table>
</div>
