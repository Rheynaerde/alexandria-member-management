<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('admin/seasons');
?>

<div id="body">

    <table class="season_data_table data_table">
        <thead>
            <tr>
                <th colspan="2"><?php echo $this->lang->line('admin/seasons.view.data'); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="property"><?php echo $this->lang->line('admin/seasons.properties.name'); ?></td>
                <td><?php echo $season->name; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('admin/seasons.properties.begin'); ?></td>
                <td><?php echo $season->begin; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('admin/seasons.properties.end'); ?></td>
                <td><?php echo $season->end; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('admin/seasons.properties.previous'); ?></td>
                <td><?php echo $season->previous; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('admin/seasons.properties.next'); ?></td>
                <td><?php echo $season->next; ?></td>
            </tr>
        </tbody>
    </table>

</div>
