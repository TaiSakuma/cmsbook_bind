<?php

use PHPUnit\Framework\TestCase;

class SideNaviTest extends TestCase
{
    public function testSideNavi()
    {
        include(__DIR__ . "/testdata/contents.php");
        $expected_html = file_get_contents(__DIR__ . '/testdata/sidenavi.html');

        $thisDir = 'test_phpunit';
        $thisFile = 'web.php';
        addHref($contents);
        addThisFile($contents, $thisDir, $thisFile);
        addThisFileAncestor($contents);
        $actual_html = mkSideNavi($contents);

        $this->assertEquals($expected_html, $actual_html);
    }

    public function testSideNaviSS()
    {
        include(__DIR__ . "/testdata/contents.php");
        $expected_html = file_get_contents(__DIR__ . '/testdata/sidenavi_ss.html');

        $thisDir = 'test_phpunit';
        $thisFile = 'web.php';
        addSectionStr($contents);
        addHref($contents);
        addThisFile($contents, $thisDir, $thisFile);
        addThisFileAncestor($contents);
        $actual_html = mkSideNavi($contents);

        $this->assertEquals($expected_html, $actual_html);
    }
}
