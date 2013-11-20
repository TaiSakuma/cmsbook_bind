<?php
include("pagemenu_functions.php");
if(!isset($showSectionStr) || $showSectionStr) addSectionStr($contents);
addHref($contents);
addThisFile($contents, $thisDir, $thisFile);
addThisFileAncestor($contents);
echo mkSideNavi($contents);
if (isset($usePagemenuToggleOpenclose) && $usePagemenuToggleOpenclose)
  include("pagemenu_toggle_openclose.php");
include("pagemenu_verticalline.php");
?>
