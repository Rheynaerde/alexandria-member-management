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
          $pdf->page_text(72, 18, "<?php echo sprintf($this->lang->line('members.overview.pdf.header.format'),date($this->lang->line('members.overview.pdf.header.dateformat'))); ?>", $font, 12, array(0,0,0));

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
    </body>
</html>