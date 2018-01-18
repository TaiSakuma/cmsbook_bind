<?php
require __DIR__ . '/../vendor/autoload.php';
if (!isset($cmsbook_root)) {
    include(dirname(__FILE__) . '/../site_config/config.php');
}
include(dirname(__FILE__) . "/header.php");
include(dirname(__FILE__) . "/subheadnavi.php");
?>
<div class="container">
<div class="span-24 torse">
<?php include(dirname(__FILE__) . "/pagemenu.php"); ?>
<div class="span-18 last" id="contentcolumn">
<?php include(dirname(__FILE__) . "/breadcrumb.php"); ?>
<div id="content">
