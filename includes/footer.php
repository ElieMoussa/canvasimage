</div>
<?php mysql_close($res1);?>


<script>!window.jQuery && document.write(unescape('%3Cscript src="js/minified/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
<!-- custom scrollbars plugin -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>


    
<script>
var scrolling = 0;

$("#f_tc").click(function(){
	$("#terms").css({"display":"block"});
	$("#terms_back_bg").css({"display":"block"});
	
	if(scrolling == 0)
	{ scrolling = 1;		
		$("#content_1").mCustomScrollbar({
				autoHideScrollbar:true,
				theme:"light-thin"
			});
	}
});

$("#terms").click(function(){
	$(this).css({"display":"none"});
	$("#terms_back_bg").css({"display":"none"});
});
$("#terms_back_bg").click(function(){
	$(this).css({"display":"none"});
	$("#terms").css({"display":"none"});
});

$("#f_prizes").click(function(){
	$("#terms").css({"display":"block"});
	$("#prize_back_bg").css({"display":"block"});
});

$("#terms").click(function(){
	$(this).css({"display":"none"});
	$("#prize_back_bg").css({"display":"none"});
});
$("#prize_back_bg").click(function(){
	$("#terms").css({"display":"none"});
	$("#prize_back_bg").css({"display":"none"});
});


$("#f_home").click(function(){
	document.location.replace('index.php');
});

$("#f_play, #skip_play").click(function(){
	document.location.replace('play.php');
});

$("#f_vote").click(function(){
	document.location.replace('vote.php');
});
</script>
</body></html>