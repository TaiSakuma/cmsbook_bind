<?php
$cmsbook_root = "";
$cmsbook_root_url = "";

$cmsbook_bind = $cmsbook_root . "/cmsbook_bind";
$cmsbook_bind_url = $cmsbook_root_url . "/cmsbook_bind";

$cmsbook_site_config = $cmsbook_bind . "/site_config";
$cmsbook_site_config_url = $cmsbook_bind_url . "/site_config";

$cmsbook_site_extra = $cmsbook_bind . "/site_extra";
$cmsbook_site_extra_url = $cmsbook_bind_url . "/site_extra";

$cmsbook_external_url = $cmsbook_bind_url . "/external";

$cmsbook_top_frame = $cmsbook_bind . "/frame";
$cmsbook_top_frame_url = $cmsbook_bind_url . "/frame";

$cmsbook_home_url = $cmsbook_root_url;

$title = 'cmsbook';

include($cmsbook_site_config . "/topcontents.php");
?>
