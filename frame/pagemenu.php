<?php
$thisDir=basename(getcwd());
$thisFile=basename($_SERVER['PHP_SELF']);

function mkTopContent($topcontents, $parentDir)
{
  $ret = '';
  foreach($topcontents as $content)
    {
      if(array_key_exists('parentDir', $content))
	{
	  if ($parentDir != $content['parentDir']) continue;
	}

      if(array_key_exists('href', $content))
	{
	  $ret = $ret . '<a href="'. $content['href'] . '" class="selected">'; 
	}
      else
	{
	  continue;
	}

      if(array_key_exists('head', $content))
	{
	  $ret = $ret . $content['head'];
	}

      $ret = $ret . '</a>'; 
    }
  return $ret;
}
?>
<div class="span-6 border" id="pagemenucolumn">
<div id="pagemenutitle">
<?php echo mkTopContent($topcontents, $parentDir); ?>
</div>
<div id="pagemenu">
<?php include("pagemenu_show.php"); ?>
</div><!--pagemenu--> 
</div>
