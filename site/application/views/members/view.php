<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('members');
$this->lang->load('countries');
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
            <tr>
                <td class="property"><?php echo $this->lang->line('members.properties.address'); ?></td>
                <td><?php
                $is_first = true;
                foreach ($addresses as $address) {
                    if(!$is_first){
                        ?><br><br><?php
                    }
                    $is_first = false;
                    if(isset($address->box)){
                        echo sprintf($this->lang->line('members.view.address.format.withbox'), $address->street, $address->number, $address->box);
                    } else {
                        echo sprintf($this->lang->line('members.view.address.format.nobox'), $address->street, $address->number);
                    }
                    ?><br><?php
                    echo sprintf($this->lang->line('members.view.address.format.city'), $address->zip, $address->city);
                    ?><br><?php
                    echo $this->lang->line('countries.' . $address->country);
                    if(isset($address->comment)){
                        ?><br><b><?php
                        echo $this->lang->line('members.view.address.comment');
                        ?></b>: <?php
                        echo $address->comment;
                    }
                }
                ?></td>
            </tr>
        </tbody>
    </table>

</div>
