<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('header');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php if (isset($title) && $title) { echo $title; } else { echo $this->lang->line('header.default.title'); } ?></title>

	<?php echo link_tag(base_url().'css/main.css'); ?>
        
        <?php if (isset($sortable_tables) && $sortable_tables) { ?>
        
        <!-- Support for sortable tables -->
        <script src="<?php echo base_url(); ?>js/sorttable.js"></script>
	<?php echo link_tag(base_url().'css/sortable_table.css'); ?>
        
        <?php } ?>
</head>
<body>

<div id="container">
	<h1><?php if (isset($title) && $title) { echo $title; } else { echo $this->lang->line('header.default.title'); } ?></h1>

<!-- END HEADER -->
