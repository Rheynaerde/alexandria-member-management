<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->lang->load('header');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php if (isset($title) && $title) { echo $title; } else { echo $this->lang->line('header.default.title'); } ?></title>

	<?php echo link_tag(base_url().'css/main.css'); ?>
</head>
<body>

<div id="container">
	<h1><?php if (isset($title) && $title) { echo $title; } else { echo $this->lang->line('header.default.title'); } ?></h1>

<!-- END HEADER -->
