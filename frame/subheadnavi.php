<?php
##____________________________________________________________________________||
$parentDir=basename(dirname(getcwd()));

##____________________________________________________________________________||
function mkSubHeadNavi($topcontents, $parentDir)
{
  $ret = '';
  $spanToClose = False;
  foreach($topcontents as $content)
    {
      if(array_key_exists('localonly', $content))
	{
	  if($content['localonly'] & ($_SERVER["SERVER_NAME"] != 'localhost')) continue;
	}
      if(array_key_exists('br', $content) && $content['br'])
	{
	      $ret = $ret . "<br />\n";
	      continue;
	}
      if(array_key_exists('right', $content))
	{
	  if($content['right'])
	    {
	      $ret = $ret . "<span style='float:right'>\n";
	      $spanToClose = True;
	      continue;
	    }
	}
      if(array_key_exists('separator', $content))
	{
	  if($content['separator'])
	    {
	      $ret = $ret . "<span> // </span>\n";
	      continue;
	    }
	}
      $ret = $ret . '<a href="'. $content['href'] . '"'; 
      if($parentDir==$content['parentDir']) $ret = $ret . ' class="selected"';
      if(array_key_exists('right', $content))
	{
	  if($content['right']) $ret = $ret . ' style="float:right"';
	}
      $ret = $ret . '>'; 
      if(array_key_exists('localonly', $content) && $content['localonly'])
	{
	  $ret = $ret . '<i class="el el-home" style="font-size:0.6em";></i>';
	  $ret = $ret . '&nbsp;';
	}
      if(array_key_exists('lock', $content) && $content['lock'])
	{
	  $ret = $ret . '<i class="el el-lock" style="font-size:0.6em";></i>';
	  $ret = $ret . '&nbsp;';
	}
      $ret = $ret . $content['head'];
      $ret = $ret . "</a>\n"; 
    }
  if($spanToClose) $ret = $ret . "</span>\n";
  return $ret;
}
##____________________________________________________________________________||
?>

<div id="subheader">
<div class="container">
<div class="span-24 last">
<div id="subheadernavi">
<?php echo mkSubHeadNavi($topcontents, $parentDir); ?>
<div class="clear"></div>
</div><!--subheadernavi--> 
</div>
</div><!--container -->
</div><!--subheader--> 
