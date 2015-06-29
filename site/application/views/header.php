<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('header');
if (isset($sortable_tables) && $sortable_tables) {
    $jquery = true;
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php if (isset($title) && $title) { echo $title; } else { echo $this->config->item('alexandria.site.default_title'); } ?></title>

	<?php echo link_tag(base_url().'css/main.css'); ?>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <?php if (isset($jquery) && $jquery) { ?>
        <script src="<?php echo base_url(); ?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
        <?php echo link_tag(base_url().'css/jquery-ui.min.css'); ?>
        <?php } ?>
        
        <?php if (isset($sortable_tables) && $sortable_tables) { ?>
        
        <!-- Support for sortable tables -->
        <script src="<?php echo base_url(); ?>js/jquery.tablesorter.combined.js"></script>
        <script src="<?php echo base_url(); ?>js/widget-filter-formatter-jui.js"></script>
	<?php echo link_tag(base_url().'css/sortable_table.css'); ?>
	<?php echo link_tag(base_url().'css/filter.formatter.css'); ?>
        
        <?php } ?>
</head>
<body>

<div id="container">
	<h1><?php if (isset($title) && $title) { echo $title; } else { echo $this->config->item('alexandria.site.default_title'); } ?></h1>

<!-- END HEADER -->
