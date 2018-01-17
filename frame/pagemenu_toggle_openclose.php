<script type="text/javascript">
 $(document).ready(function() {
     if ($("#contentcolumn").height() < $("#pagemenucolumn").height()) {
       $("#contentcolumn").css("height", $("#pagemenucolumn").height());
     }

     $("#pagemenu > ul > li.has_subcontents > div").prepend('<img class="imgtriangle" alt="" src="<?php echo $cmsbook_top_frame_url . "/icons/pagemanu_empty.png"; ?>" />');
     $("#pagemenu > ul > li.selected_ancestor").filter(".has_subcontents").addClass("open");
     $("#pagemenu > ul > li.selected").filter(".has_subcontents").addClass("open");


     $("#pagemenu > ul > li.has_subcontents > div > img").attr('src', "<?php echo $cmsbook_top_frame_url  . "/icons/pagemanu_right.png"; ?>");
     $("#pagemenu > ul > li.has_subcontents.open > div > img").attr('src', "<?php echo $cmsbook_top_frame_url . "/icons/pagemanu_down.png"; ?>");
     $("#pagemenu > ul > li").not(".open").children().filter('ul').hide();

     $("#pagemenu > ul > li.has_subcontents > div").click(function() {
	 $(this).parent().toggleClass("open");
	 $("#pagemenu > ul > li.has_subcontents > div > img").attr('src', "<?php echo $cmsbook_top_frame_url . "/icons/pagemanu_right.png"; ?>");
	 $("#pagemenu > ul > li.has_subcontents.open > div > img").attr('src', "<?php echo $cmsbook_top_frame_url . "/icons/pagemanu_down.png"; ?>");
	 $(this).siblings().filter('ul').slideToggle(50);
	 return false;
       });
 });
</script>
