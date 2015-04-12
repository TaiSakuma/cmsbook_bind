<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="<?php echo $cmsbook_external_url . "/blueprint/blueprint/screen.css"; ?>"  type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php echo $cmsbook_external_url . "/blueprint/blueprint/print.css"; ?>"  type="text/css" media="print" />
<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo $cmsbook_external_url . "/blueprint/blueprint/ie.css"; ?>"  type="text/css" media="screen, projection"><![endif]-->
<link rel="stylesheet" href="<?php echo $cmsbook_external_url . "/elusive-icons-2.0.0/css/elusive-icons.min.css"; ?>" />
<link rel="stylesheet" href="<?php echo $cmsbook_external_url . "/blueprint/blueprint/plugins/fancy-type/screen.css"; ?>"  type="text/css" media="screen, projection" />  
<link rel="stylesheet" href="<?php echo $cmsbook_top_frame_url . "/layout.css"; ?>"  type="text/css" media="screen, projection" />
<?php 
 if ( is_file($cmsbook_site_config . "/site_html_head.php") )
   include($cmsbook_site_config . "/site_html_head.php");
?>
</head>
<body onload="prettyPrint()">
<div class="container">
  <div class="span-24 last">
    <div id="header">
      <?php
        if ( is_file($cmsbook_site_config . "/site_body_header.php") )
          include($cmsbook_site_config . "/site_body_header.php");
      ?>
    </div><!--header--> 
  </div>
