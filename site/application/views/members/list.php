<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('members');
?>

<div id="body">
    <table class="sortable">
        <thead>
            <th style="min-width: <?php echo $this->lang->line('members.overview.lastname.minwidth'); ?>"><?php echo $this->lang->line('members.properties.lastname'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('members.overview.firstname.minwidth'); ?>"><?php echo $this->lang->line('members.properties.firstname'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('members.overview.birthdate.minwidth'); ?>"><?php echo $this->lang->line('members.properties.birthdate'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('members.overview.gender.minwidth'); ?>" class="sorttable_nosort"><?php echo $this->lang->line('members.properties.gender'); ?></th>
            <th style="min-width: <?php echo $this->lang->line('members.overview.hand.minwidth'); ?>" class="sorttable_nosort"><?php echo $this->lang->line('members.properties.hand'); ?></th>
        </thead>
        <tbody>
<?php foreach ($query->result() as $row) { ?>
            <tr>
                <td><?php echo $row->lastName; ?></td>
                <td><?php echo $row->firstName; ?></td>
                <td><?php echo $row->birthdate; ?></td>
                <td><?php echo $this->lang->line('members.properties.gender.' . $row->gender); ?></td>
                <td><?php echo $this->lang->line('members.properties.hand.' . $row->hand); ?></td>
            </tr>
<?php } ?>
        </tbody>
    </table>
</div>
