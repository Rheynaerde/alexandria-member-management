<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('pdf/members');
$this->lang->load('members');
$this->lang->load('countries');

?>
<html>
    <head>
	<?php echo link_tag(base_url().'css/print_general.css'); ?>
	<?php echo link_tag(base_url().'css/print_infosheet.css'); ?>
        <style>
            body {
                margin-top: 10px;
            }
        </style>
</head>

<body>

<div id="body">

<div id="section_header">
</div>

<div id="content">
  
<div class="page">

    <table class="infosheet_header">
        <tr>
            <?php if($this->config->item('alexandria.infosheet.logo.include')) { ?>
            <td width="70"><img src="<?php echo base_url(); ?>images/<?php echo $this->config->item('alexandria.infosheet.logo.filename'); ?>" height="100"></td>
            <?php } ?>
            <td class="infosheet_title"><?php echo $this->lang->line('pdf/members.infosheet.title'); ?></td>
        </tr>
    </table>
    
    <div class="infosheet_section_title"><?php echo $this->lang->line('pdf/members.infosheet.section.title.data'); ?></div>
    
    <table class="infosheet_maindata_table">
        <tr>
            <td class="infosheet_property"><?php echo $this->lang->line('members.properties.lastname'); ?></td>
            <td class="infosheet_property_value"><?php echo $member->last_name; ?></td>
            <td class="infosheet_spacercell">&nbsp;</td>
            <td class="infosheet_property"><?php echo $this->lang->line('members.properties.birthdate'); ?></td>
            <td class="infosheet_property_value"><?php echo $member->birthdate; ?></td>
        </tr>
        <tr>
            <td class="infosheet_property"><?php echo $this->lang->line('members.properties.firstname'); ?></td>
            <td class="infosheet_property_value"><?php echo $member->first_name; ?></td>
            <td class="infosheet_spacercell">&nbsp;</td>
            <td class="infosheet_property"><?php echo $this->lang->line('members.properties.gender'); ?></td>
            <td class="infosheet_property_value"><?php echo $this->lang->line('members.properties.gender.' . $member->gender); ?></td>
        </tr>
        <tr>
            <td class="infosheet_property"><?php echo $this->lang->line('members.properties.familiarname'); ?></td>
            <td class="infosheet_property_value"><?php 
                if(isset($member->familiar_name)){
                    echo $member->familiar_name;
                } else {
                    echo $member->first_name;
                }
                ?></td>
            <td class="infosheet_spacercell">&nbsp;</td>
            <td class="infosheet_property"><?php echo $this->lang->line('members.properties.hand'); ?></td>
            <td class="infosheet_property_value"><?php echo $this->lang->line('members.properties.hand.' . $member->hand); ?></td>
        </tr>
    </table>
    
    <div class="infosheet_section_title"><?php echo $this->lang->line('pdf/members.infosheet.section.title.address'); ?></div>
    
    <table class="infosheet_address_table">
        <tr>
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
    </table>

    <div class="infosheet_section_title"><?php echo $this->lang->line('pdf/members.infosheet.section.title.mailaddress'); ?></div>
    
    <table class="infosheet_data_table">
        <thead>
            <tr>
                <th class="no_stretch"><?php echo $this->lang->line('members.properties.mailaddress'); ?></th>
                <th><?php echo $this->lang->line('pdf/members.infosheet.remark'); ?> <span class="infosheet_example"><?php echo $this->lang->line('pdf/members.infosheet.remark.example.mailaddress'); ?></span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($mailaddresses as $mailaddress){ 
                if($mailaddress->is_active) {?>
            <tr>
                <td class="no_stretch no_break no_wrap"><?php echo $mailaddress->mailaddress; ?></td>
                <td><?php echo $mailaddress->comment; ?></td>
            </tr>
            <?php 
                }
                } ?>
            <tr>
                <td class="no_stretch">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
    
    <div class="infosheet_section_title"><?php echo $this->lang->line('pdf/members.infosheet.section.title.telephonenumber'); ?></div>
    
    <table class="infosheet_data_table">
        <thead>
            <tr>
                <th class="no_stretch"><?php echo $this->lang->line('members.properties.telephonenumber'); ?></th>
                <th><?php echo $this->lang->line('pdf/members.infosheet.remark'); ?> <span class="infosheet_example"><?php echo $this->lang->line('pdf/members.infosheet.remark.example.telephonenumber'); ?></span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($telephonenumbers as $telephonenumber){ 
                if($telephonenumber->is_active) {?>
            <tr>
                <td class="no_stretch no_break no_wrap"><?php echo $telephonenumber->telephone_number; ?></td>
                <td><?php echo $telephonenumber->comment; ?></td>
            </tr>
            <?php 
                }
                } ?>
            <tr>
                <td class="no_stretch">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
    
    <div class="infosheet_section_title"><?php echo $this->lang->line('pdf/members.infosheet.section.title.signature'); ?></div>
    
    <div class="infosheet_text">
        <ul>
            <li><?php echo $this->lang->line('pdf/members.infosheet.agreement.correct_data'); ?></li>
<?php if($medical) {?>
            <li><?php echo $this->lang->line('pdf/members.infosheet.agreement.medical'); ?></li>
<?php } ?>
            <li><?php echo $this->lang->line('pdf/members.infosheet.agreement.payment'); ?></li>
            <li><?php 
echo sprintf($this->lang->line('pdf/members.infosheet.agreement.license.format'), 
        $this->config->item('alexandria.site.club_name'),
        $season->name,
        '<b>' . sprintf($this->lang->line('pdf/members.infosheet.agreement.license.nameformat'),
                $member->first_name, $member->last_name) . '</b>'); 
?></li>
        </ul>
    </div>
    
    <div class="infosheet_signature_container">
        <?php
        if($member->age < $this->config->item('alexandria.legal.age')){
        ?>
        <table class="infosheet_guardian">
            <tr>
                <td class="infosheet_guardian_head no_break no_wrap"><?php echo $this->lang->line('pdf/members.infosheet.agreement.guardian'); ?>:</td>
                <td class="infosheet_guardian_value">&nbsp;</td>
            </tr>
        </table>
        <?php
        }
        ?>
        <table class="infosheet_signature_box">
            <tr>
                <td><?php echo $this->lang->line('pdf/members.infosheet.agreement.signature'); ?>:</td>
            </tr>
        </table>
    </div>

</div>

</div>
</div>

</body>
</html>