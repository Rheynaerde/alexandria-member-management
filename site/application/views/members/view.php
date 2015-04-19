<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('members');
?>

<div id="body">

    <table class="member_data_table">
        <thead>
            <tr>
                <th colspan="2"><?php echo $this->lang->line('members.view.data'); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="property"><?php echo $this->lang->line('members.properties.lastname'); ?></td>
                <td><?php echo $member->lastName; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('members.properties.firstname'); ?></td>
                <td><?php echo $member->firstName; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('members.properties.birthdate'); ?></td>
                <td><?php echo $member->birthdate; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('members.properties.gender'); ?></td>
                <td><?php echo $this->lang->line('members.properties.gender.' . $member->gender); ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('members.properties.hand'); ?></td>
                <td><?php echo $this->lang->line('members.properties.hand.' . $member->hand); ?></td>
            </tr>
        </tbody>
    </table>

</div>
