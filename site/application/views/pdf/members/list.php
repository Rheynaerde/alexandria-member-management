<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<html>
    <head>
	<?php echo link_tag(base_url().'css/print_table.css'); ?>
        <style>
            body {
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <script type="text/php">

        if ( isset($pdf) ) {

          $font = Font_Metrics::get_font("verdana", "bold");
          $pdf->page_text(72, 18, "<?php echo $title; ?>", $font, 12, array(0,0,0));

        }
        </script>
    <table>
        <thead>
            <tr>
            <th><?php echo $this->lang->line('members.properties.lastname'); ?></th>
            <th><?php echo $this->lang->line('members.properties.firstname'); ?></th>
            <th><?php echo $this->lang->line('members.properties.birthdate'); ?></th>
            <th><?php echo $this->lang->line('members.properties.gender'); ?></th>
            <th><?php echo $this->lang->line('members.properties.hand'); ?></th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($members as $member) { ?>
            <tr>
                <td><?php echo $member->last_name; ?></td>
                <td><?php echo $member->first_name; ?></td>
                <td><?php echo $member->birthdate; ?></td>
                <td><?php echo $this->lang->line('members.properties.gender.' . $member->gender); ?></td>
                <td><?php echo $this->lang->line('members.properties.hand.' . $member->hand); ?></td>
            </tr>
<?php } ?>
        </tbody>
    </table>
    </body>
</html>