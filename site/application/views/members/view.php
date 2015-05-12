<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('members');
$this->lang->load('countries');
$this->lang->load('membershiptypes');
$this->lang->load('certificatetypes');
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
            <tr>
                <td class="property"><?php echo $this->lang->line('members.properties.mailaddress'); ?></td>
                <td><?php
                $is_first = true;
                foreach ($mailaddresses as $mailaddress) {
                    if(!$is_first){
                        ?>, <?php
                    }
                    $is_first = false;
                    if($mailaddress->isActive){
                        ?><a href="mailto:<?php echo $mailaddress->mailaddress;
                        ?>"><?php echo $mailaddress->mailaddress;
                        ?></a><?php
                    } else {
                        ?><span class="inactivemail"><?php
                        echo $mailaddress->mailaddress;
                        ?></span><?php
                    }
                    if(isset($mailaddress->comment)){
                        ?> (<?php
                        echo $mailaddress->comment;
                        ?>)<?php
                    }
                }
                ?></td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th colspan="2"><?php echo $this->lang->line('members.view.memberships'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($memberships as $membership){
            ?>
            <tr>
                <td colspan="2">
                    <b><?php echo $this->lang->line('membershiptypes.' . $membership->type); ?></b>
                    (<?php
                    if($membership->type == 'trial_lesson') {
                        echo sprintf($this->lang->line('members.view.memberships.dateformat.single'),
                                date($this->lang->line('members.view.memberships.dateformat'),
                                        strtotime($membership->start_date)));
                    } else {
                        echo sprintf($this->lang->line('members.view.memberships.dateformat.period'),
                                date($this->lang->line('members.view.memberships.dateformat'),
                                        strtotime($membership->start_date)),
                                date($this->lang->line('members.view.memberships.dateformat'),
                                        strtotime($membership->end_date)));
                    }
                    ?>)
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <thead>
            <tr>
                <th colspan="2"><?php echo $this->lang->line('members.view.certificates'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($certificates as $certificate){
            ?>
            <tr>
                <td colspan="2">
                    <b><?php echo $this->lang->line('certificatetypes.' . $certificate->type); ?></b>
                    (<?php
                    echo sprintf($this->lang->line('members.view.certificates.dateformat.period'),
                                date($this->lang->line('members.view.certificates.dateformat'),
                                        strtotime($certificate->start_date)),
                                date($this->lang->line('members.view.certificates.dateformat'),
                                        strtotime($certificate->end_date)));
                    ?>)
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
