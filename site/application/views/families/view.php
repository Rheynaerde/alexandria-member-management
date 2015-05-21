<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('families');
?>

<div id="body">

    <table class="family_data_table data_table">
        <thead>
            <tr>
                <th colspan="2"><?php echo $this->lang->line('families.view.data'); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="property"><?php echo $this->lang->line('families.properties.name'); ?></td>
                <td><?php echo $family->name; ?></td>
            </tr>
            <tr>
                <td class="property"><?php echo $this->lang->line('families.properties.description'); ?></td>
                <td><?php echo $family->description; ?></td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th colspan="2"><?php echo $this->lang->line('families.view.members'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($members as $member){
            ?>
            <tr>
                <td colspan="2">
                    <?php 
                    if($this->session->userdata('has_member_management_rights') || $member->can_manage){
                        ?><a href="<?php echo site_url('members/view/' . $member->id); ?>"><?php
                        echo sprintf($this->lang->line('families.view.member.format'),
                            $member->first_name, $member->last_name);
                        ?></a><?php
                    } else {
                        echo sprintf($this->lang->line('families.view.member.format'),
                            $member->first_name, $member->last_name);
                    } ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
