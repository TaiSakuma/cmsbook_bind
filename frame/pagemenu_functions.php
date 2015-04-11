<?php

//___________________________________________________________________
function addSectionStr(&$contents, $preSectionStr = '')
{
  $itemnumber = 1;
  foreach($contents as &$content)
    {
      $sectionStr = $preSectionStr . "$itemnumber";
      $content['sectionStr'] = $sectionStr;
      if(isset($content['subcontents'])) addSectionStr($content['subcontents'], $sectionStr . '.');
      $itemnumber += 1;
    }
}
//___________________________________________________________________
function addHref(&$contents)
{
  foreach($contents as &$content)
    {
      $content['href'] = '../';

      if(array_key_exists('dir', $content))
	$content['href'] = $content['href'] . $content['dir'] . '/';

      if(array_key_exists('file', $content))
	$content['href'] = $content['href'] . $content['file'];

      if(isset($content['subcontents'])) addHref($content['subcontents']);
    }
}

//___________________________________________________________________
function addThisFile(&$contents, $thisDir, $thisFile)
{
  foreach($contents as &$content)
    {
      if (array_key_exists('dir', $content) && $thisDir == $content['dir'] && $thisFile == $content['file'])
		$content['thisFile'] = TRUE;
      elseif(isset($content['subcontents']))
		addThisFile($content['subcontents'], $thisDir, $thisFile);
    }
}

//___________________________________________________________________
function addThisFileAncestor(&$contents)
{
  foreach($contents as &$content)
    {
      if(array_key_exists('thisFile', $content) && $content['thisFile']) return True;

      if(isset($content['subcontents']))
	if(addThisFileAncestor($content['subcontents']))
	  {
	    $content['thisFileAncestor'] = TRUE;
	    return True;
	  }
    }
  return False;
}

//___________________________________________________________________
function getThisFileSectionStr($contents)
{
  foreach($contents as $content)
    {
      if(array_key_exists('thisFile', $content) && $content['thisFile'])
		{
		  if (array_key_exists('sectionStr', $content))
			return $content['sectionStr'] . '&nbsp;&nbsp;&nbsp;' . $content['head'];
		  else
			return '&nbsp;&nbsp;&nbsp;' . $content['head'];
		}
      elseif(isset($content['subcontents']))
		{
		  $ret = getThisFileSectionStr($content['subcontents']);
		  if(!empty($ret)) return $ret;
		}
    }
  return '';
}

//___________________________________________________________________
function mkSideNavi($contents)
{
  $ret = '';
  if(!count($contents)) return $ret;
  $ret = $ret . "<ul>\n";
  foreach($contents as $content)
    {
      if(array_key_exists('localonly', $content))
	{
	  if($content['localonly'] & ($_SERVER["SERVER_NAME"] != 'localhost')) continue;
	}
      $sub = '';
      if(isset($content['subcontents']))
		{
		  $ret = $ret . "\n";
		  $sub = mkSideNavi($content['subcontents']);
		}
      $ret = $ret . '<li';
      $ret = $ret . ' class="';
      if (array_key_exists('thisFile', $content) && $content['thisFile']) $ret = $ret . " selected";
      if (array_key_exists('thisFileAncestor', $content) && $content['thisFileAncestor']) $ret = $ret . " selected_ancestor";
      if(!empty($sub)) $ret = $ret . " has_subcontents";
      $ret = $ret . '"';
      $ret = $ret . '>';
      $ret = $ret . '<div>';
      if (!array_key_exists('nolink', $content) || !$content['nolink']) 
		{
		  $ret = $ret . '<a href="';
		  $ret = $ret . $content['href'];
		  $ret = $ret . '"';
		  if (array_key_exists('thisFile', $content) && $content['thisFile']) $ret = $ret . " class=\"selected\"";
		  if (array_key_exists('thisFileAncestor', $content) && $content['thisFileAncestor']) $ret = $ret . " class=\"selected_ancestor\"";
		  $ret = $ret . '>';
		}
      if (array_key_exists('sectionStr', $content)) $ret = $ret . $content['sectionStr'];
      $ret = $ret . '&nbsp;&nbsp;';
      $ret = $ret . $content['head'];
      if(array_key_exists('lock', $content) && $content['lock'])
		{
		  $ret = $ret . '&nbsp;&nbsp;';
		  $ret = $ret . "\n";
		  $ret = $ret . mkLockIcon();
		  $ret = $ret . "\n";
		}
      if (!array_key_exists('nolink', $content) || !$content['nolink']) 
		$ret = $ret . '</a>';
      $ret = $ret . '</div>';
      if(!empty($sub)) $ret = $ret . $sub;
      $ret = $ret . "</li>\n";
    }
  $ret = $ret . "</ul>\n";
  return $ret;
}
//___________________________________________________________________
function internalLink($url, $contents)
{
  foreach($contents as $content)
    {
      if ($content['href'] == $url)
	{
	  $ret = '';
	  $ret = $ret . '<a href="' . $url . '">';
	  $ret = $ret . $content['sectionStr'] . ' ' . $content['head'];
	  $ret = $ret . '</a>';
	  return $ret;
	}
      elseif(isset($content['subcontents']))
	{
	  $ret = internalLink($url, $content['subcontents']);
	  if(!empty($ret)) return $ret;
	}
    }
}
//___________________________________________________________________
function mkBreadCrumb($contents)
{
  foreach($contents as $content)
    {
      if(array_key_exists('thisFile', $content) && $content['thisFile']) 
	{
	  $ret = '<a href="'. $content['href'] . '">';
	  $ret = $ret . $content['head'] . '</a>';
	  return $ret;
	}
      elseif(isset($content['subcontents']))
	{
	  $ret = mkBreadCrumb($content['subcontents']);
	  if(!empty($ret)) 
	    {
	      $pre = '';
	      if (!array_key_exists('nolink', $content) || !$content['nolink'])
		{
		  $pre = $pre . '<a href="'. $content['href'] . '">';
		}
	      $pre = $pre . $content['head'];
	      if (!array_key_exists('nolink', $content) || !$content['nolink'])
		{
		  $pre = $pre . '</a>';
		}
	      $ret = $pre . '&nbsp;  >> &nbsp;'. $ret;
	      return $ret;
	    }
	}
    }
  return '';
}
//___________________________________________________________________
?>
