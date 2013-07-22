<div class="vote_table" style="text-align:center">
            	<div style="background-image:url(images/v_border.png); width:240px; height:190px"><img style="width:240px;" src="<?php echo $property['image'];?>" /></div>
                <div style="width:250px; height:12px;"></div>
            	<div style="margin:auto; width:37px"><div class="v_number"><?php echo $property['votes'];?></div></div>
                <div style="margin:auto; width:193px; height:74px">
                	<div class="v_text">
                    	<div style="width:190px; color:#FFF; text-align:center;font-family: 'Conv_gotham-bold'; font-size:11px; text-transform:uppercase"><p style="-webkit-margin-before: 4px !important;"><?php echo $property['name'];?></p></div>
                        <div style="width:190px; text-align:center; position:absolute; bottom:0; color:#FFF;font-family: 'Conv_gotham-bold'; font-size:12px; text-transform:uppercase"><p style="-webkit-margin-before: 7px !important;-webkit-margin-after: 7px !important;"><a style="color:#FFF; text-decoration:none" href="#" onClick="voteFor(<?php echo $property['id'];?>)">vote</a> &nbsp; <img src="images/dot.png" /> &nbsp; <a style="color:#FFF; text-decoration:none" href="#" class="shareit" onclick="document.getElementById('bbac_image').value='<?php echo $property['image'];?>'">share</a> &nbsp;<img src="images/dot.png" /> &nbsp;<a style="color:#FFF; text-decoration:none" href="#" onClick="sendRequestViaMultiFriendSelector()">invite</a></p></div>
                    </div>
                </div>
                
             </div>